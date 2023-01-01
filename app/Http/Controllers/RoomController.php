<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('room_number')->paginate(15);
       $hotels = Hotel::all();
        return view('rooms.index', compact('rooms', 'hotels'));
    }

    public function rooms_hotels($hotel_id)
    {
     $rooms = Room::where('hotel_id', $hotel_id)->orderBy('room_number')->paginate(15);
     $hotels = Hotel::all();
        return view('rooms.index', compact('rooms', 'hotels', 'hotel_id'));
    }

    public function create($id)
    {
       
        
        return view('rooms.create', compact('id'));
    }

    public function store(Request $request)
    {
       
        $attributes =  request()->validate([

            'room_name' => ['required', 'max:255'],
            'room_id' => ['required ', 'numeric'],
            'room_number' => ['required ', 'max:20', 'numeric'],
            'unit_id' => ['required ', 'max:5', 'numeric'],
            'room_size' => ['required ', 'numeric'],
            'room_floor' => ['required ', 'max:5', 'numeric'],
            'hotel_id' => ['required', 'max:5', 'numeric'],
        ]);
        
       //dd($attributes);
        Room::create($attributes);
        session()->flash('success', 'Room has been added');
        session()->flash('type', 'New Room');
        
        return redirect()->route('rooms_hotels', ['hotel_id' => $attributes['hotel_id']]);

        //return redirect('/expenses/dashboard');
    }
    public function edit(Room $room)
    {
         //dd($expenses);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        
        $attributes =  request()->validate([

            'room_name' => ['required', 'max:255'],
            'room_id' => ['required ', 'numeric'],
            'room_number' => ['required ', 'max:20', 'numeric'],
            'unit_id' => ['required ', 'max:5', 'numeric'],
            'room_size' => ['required ', 'numeric'],
            'room_floor' => ['required ', 'max:5', 'numeric'],
            'hotel_id' => ['required', 'max:5', 'numeric'],
        ]);
      //  dd($attributes);
        $room->update($attributes);
        session()->flash('success', 'Room has been updated');
        session()->flash('type', 'Room Update');
        
        return redirect('rooms');
    }


}
