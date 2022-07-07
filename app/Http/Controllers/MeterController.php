<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use App\Models\Utility;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meters = Meter::paginate(15);
        return view('meters.index', compact('meters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meters = Meter::all();
        return view('meters.create', compact('meters'));
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
            'utility_id' => ['required', 'numeric'],
            'meter_number' => ['required', 'max:255'],
            'sertificate_expiration_date' => ['required'],
            'sertificate_image' => ['image'],
        ]);
        if (isset($attributes['sertificate_image'])) {
            
          $attributes['sertificate_image'] = request()->file('sertificate_image')->store('sertificate_image');
        }
      //  dd($attributes);
             
        Meter::create($attributes);
         session()->flash('success', 'New Meter Created');
         session()->flash('type', 'New Meter');

        return redirect('meters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meter $meter)
    {
        $utilities = Utility::all(); 
      //  dd($utilities) ;   
        return view('meters.edit', compact('meter', 'utilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meter $meter)
    {
        $attributes =  request()->validate([
            'utility_id' => ['required', 'numeric'],
            'meter_number' => ['required', 'max:255'],
            'sertificate_expiration_date' => ['required'],
            'sertificate_image' => ['image'],
        ]);
        if (isset($attributes['sertificate_image'])) {
            
            $attributes['sertificate_image'] = request()->file('sertificate_image')->store('sertificate_image');
          }
        //dd($attributes);
             
      $meter->update($attributes);
     
         session()->flash('success', 'Meter Updated');
         session()->flash('type', 'Meter Update');

        return redirect('meters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
