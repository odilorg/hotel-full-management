<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomRepairController extends Controller
{
    public function index()
    {
       //dd('test');
        $repairs =  RoomRepair::paginate(15);

        return view('roomrepairs.index', compact('repairs'));
    }

    public function create()
    {
        $room_numbers = Room::all()->pluck('room_number')->sort();
       // dd($room_numbers);
        return view('roomrepairs.create', compact('room_numbers'));
    }

    public function store(Request $request)
    {
        
        $attributes =  request()->validate([
            'repair_date' => ['required'],
            'repair_name' => ['required','max:555'],
            'repair_amount' => ['numeric'],
            'room_number' => ['required'],
            'repair_comments' => ['max:255'],
        ]);
        //dd($attributes);
             
        RoomRepair::create($attributes);
         session()->flash('success', 'New Repair Created');
         session()->flash('type', 'New Repair');

        return redirect('roomrepairs'); 
    }

    public function edit($id )
    {
       
       $roomRepair = RoomRepair::where('id', $id)->first();
       $room_numbers = Room::all()->pluck('room_number')->sort();
     //  dd($roomRepair->room_number);
        return view('roomrepairs.edit', compact('roomRepair', 'room_numbers'));
    }
    public function update(Request $request, $id)
    {
        $attributes =  request()->validate([
            'repair_date' => ['required'],
            'repair_name' => ['required','max:555'],
            'repair_amount' => ['numeric'],
            'room_number' => ['required'],
            'repair_comments' => ['max:255'],
        ]);
        $roomRepair = RoomRepair::where('id', $id)->first();
      // dd($roomRepair);
        $roomRepair->update($attributes);
        session()->flash('success', 'Repair Updated');
         session()->flash('type', 'Repair Update');

        return redirect('roomrepairs');
    }
    public function destroy($id)
    {
        $roomRepair = RoomRepair::where('id', $id)->first();
        $roomRepair->delete();
        session()->flash('success', 'Repair Deleted');
        session()->flash('type', 'Repair Delete');
        return redirect('roomrepairs');
    }
    
}
