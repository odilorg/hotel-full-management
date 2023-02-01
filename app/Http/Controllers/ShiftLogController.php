<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Shift;
use App\Models\ShiftLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShiftLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift = Shift::where('user_id', Auth::id())->first();
        $rooms = Room::where('hotel_id', $shift->hotel_id)->orderBy('room_number', 'asc')->get();
        return view('shift_logs.create', compact('rooms'));
        dd('log create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes =  request()->validate([

            'shift_log_description' => ['max:255' ],
            
            'room_id' => ['required ', 'numeric'],
           
   
        ]);
        $shift = Shift::where('user_id', auth()->user()->id)->first();
        
       
      
        $attributes['shift_id'] = $shift->id;
       // dd($attributes);
       ShiftLog::create($attributes);
       session()->flash('success', 'Shift Log has been added');
       session()->flash('type', 'New Shift Log');
       
       return redirect()->route('shifts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShiftLog  $shiftLog
     * @return \Illuminate\Http\Response
     */
    public function show(ShiftLog $shiftLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShiftLog  $shiftLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ShiftLog $shiftLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShiftLog  $shiftLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShiftLog $shiftLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShiftLog  $shiftLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShiftLog $shiftLog)
    {
        //
    }
}
