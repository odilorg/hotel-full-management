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
       
        // $reports = DB::table('reservations')->select('report_number')->whereNotNull('report_number')->distinct()->get();
        // $expenses = ExpenseCategory::get();
        // $payments = PaymentType::get();
        return view('room.create');
    }

    public function store(Request $request)
    {
       
        $attributes =  request()->validate([

            'room_name' => ['required', 'max:255'],
            'room_id' => ['required ', 'max:5', 'numeric'],
            'room_number' => ['required ', 'max:5', 'numeric'],
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


}
