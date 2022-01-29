<?php

namespace App\Http\Controllers;

use App\Models\Tourgroup;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = auth()->user()->id;

        $restaurants = Restaurant::with(['tourgroup'])
       ->whereHas('tourgroup', function($q) use($value) {
       $q->where('user_id', '=', $value); 
        })
        ->paginate(13);
        
    //    / dd($guides);
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
        return view('restaurants.create', compact('tourgroups'));
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

            'restaurant_name' => ['required ', 'max:255'],
            'restaurant_city' => ['required','max:25'],
            'book_date_time' => ['required', 'max:255'],
            'restaurant_status' => ['required', 'max:255'],
            'extra_info_restaurant' => ['max:255'],
            'restaurant_tel' => ['regex:/(^[(]([0-9]{2}+)[)]\s[0-9]{3}[-][0-9]{4})/u'],
            'tourgroup_id' => ['required'],
        ]);
        //dd($attributes);
        Restaurant::create($attributes);
        session()->flash('success', 'Restaurant has been added');
        session()->flash('type', 'New Restaurant');

       return redirect('restaurants');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $tourgroup_name = $restaurant->tourgroup->tourgroup_name;
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('restaurants.edit', compact('restaurant', 'tourgroups', 'tourgroup_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $attributes =  request()->validate([

            'restaurant_name' => ['required ', 'max:255'],
            'restaurant_city' => ['required','max:25'],
            'book_date_time' => ['required', 'max:255'],
            'restaurant_status' => ['required', 'max:255'],
            'extra_info_restaurant' => ['max:255'],
            'restaurant_tel' => ['regex:/(^[(]([0-9]{2}+)[)]\s[0-9]{3}[-][0-9]{4})/u'],
            'tourgroup_id' => ['required'],
        ]);
        $restaurant->update($attributes);
        
        return redirect('restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect('restaurants');
    }
}
