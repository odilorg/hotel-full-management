<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::paginate(15);
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
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
            'hotel_name' => ['required', 'max:255'],
            'hotel_slug' => ['required','max:255'],
            'hotel_address' => ['required', 'max:255'],
            'hotel_room_quantity' => ['required', 'numeric', 'max:40'],
            'hotel_phone' => ['required', 'digits_between:9,12'],
            'hotel_email' => ['required', 'email'],
            
        ]);
              
        Hotel::create($attributes);
         session()->flash('success', 'New Hotel Created');
         session()->flash('type', 'New Hotel');

        return redirect('hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $attributes =  request()->validate([
            'hotel_name' => ['required', 'max:255'],
            'hotel_slug' => ['required','max:255'],
            'hotel_address' => ['required', 'max:255'],
            'hotel_room_quantity' => ['required', 'numeric' ],
            'hotel_phone' => ['required', 'digits_between:9,12'],
            'hotel_email' => ['required', 'email'],
            
        ]);
        $hotel->update($attributes);
       
        session()->flash('success', 'Hotel Updated');
        session()->flash('type', 'Hotel Update');
        return redirect('hotels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect('hotels');
    }
}
