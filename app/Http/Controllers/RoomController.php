<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('room_number')->paginate(15);
        return view('rooms.index', compact('rooms'));
    }
}
