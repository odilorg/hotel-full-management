<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tourgroup;
use Illuminate\Http\Request;
use App\Models\Hotelreservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HotelreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = auth()->user()->id;

        $hotelreservations = Hotelreservation::with(['tourgroup'])
       ->whereHas('tourgroup', function($q) use($value) {
       $q->where('user_id', '=', $value); 
        })
        ->paginate(13);
        return view('hotelreservations.index', compact('hotelreservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
        return view('hotelreservations.create', compact('tourgroups'));
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
            'hotel_city' => ['required', 'max:255'],
            'hotel_name' => ['required', 'max:255'],
            'checkin_date' => ['required', 'max:255'],
            'checkout_date' => ['required', 'max:255'],
            'early_checkin' => ['required', 'max:255'],
            'late_checkout' => ['required', 'max:255']
            

        ]);
       
        $attributes['tourgroup_id'] =$request->get('tour_id');
        Hotelreservation::create($attributes);
         session()->flash('success', 'Hotel reservation has been created');
         session()->flash('type', 'Hotel Reservation');

        return redirect('hotelreservations');    

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Hotel Reservcation - $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotelreservation $hotelreservation)
    {
       
       $tourgroup_name = $hotelreservation->tourgroup->tourgroup_name;
       $hotelres = $hotelreservation;
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('hotelreservations.edit', compact('hotelres', 'tourgroups', 'tourgroup_name'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Hotelreservation $hotelreservation, Request $request)
    {
        // $hotelreservations = Hotelreservation::where('id', $id)->update([
        //     'hotel_city' => $request->input('hotel_city'),
        //     'hotel_name' => $request->input('hotel_name')
            
        // ]);

        $attributes =  request()->validate([
            'hotel_city' => ['required', 'max:255'],
            'hotel_name' => ['required', 'max:255'],
            'checkin_date' => ['required', 'max:255'],
            'checkout_date' => ['required', 'max:255'],
            'early_checkin' => ['required', 'max:255'],
            'late_checkout' => ['required', 'max:255']
            

        ]);
        
        // $attributes['checkin_date'] = Carbon::createFromFormat('m/d/Y', $request->checkin_date)->format('Y-m-d');
        // $attributes['checkout_date'] = Carbon::createFromFormat('m/d/Y', $request->checkout_date)->format('Y-m-d');
       // dd($attributes);
        $hotelreservation->update($attributes);
        
        return redirect('hotelreservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\H
     * ttp\Response
     */
    public function destroy(Hotelreservation $hotelreservation)
    {
        
       
        $hotelreservation->delete();
        return redirect('hotelreservations');
}
}