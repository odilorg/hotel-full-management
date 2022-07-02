<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use App\Models\Utility;
use App\Models\UtilityUsage;
use Illuminate\Http\Request;

class UtilityUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utility_usages =  UtilityUsage::paginate(15);
       // $meters = Meter::all();
        return view('utility_usages.index', compact('utility_usages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $utilities = Utility::all();
        $meters = Meter::all();
//joins
// $meter_name = Utility::join('meters', 'meters.utility_id', '=', 'utilities.id')
            

// ->select([
    
//     'meters.*',
//     'utilities.*',
    
     
//        ])
// ->get();
//$utility = Utility::where('id', 2)->first();
//dd($utility);

      

        //dd($utility->meters()->get());
         return view('utility_usages.create', compact('utilities', 'meters'));
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
            'usage_date' => ['required'],
            'meter_latest' => ['required','numeric'],
            'meter_previous' => ['numeric', 'required'],
           
            'utility_id' => ['required', 'numeric'],
            
        ]);
        $attributes['meter_difference'] = $attributes['meter_latest'] - $attributes['meter_previous'];
        //dd($attributes);
             
        UtilityUsage::create($attributes);
         session()->flash('success', 'New Usage Created');
         session()->flash('type', 'New Usage');

        return redirect('utility_usages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function show(UtilityUsage $utilityUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(UtilityUsage $utilityUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UtilityUsage $utilityUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UtilityUsage $utilityUsage)
    {
        //
    }
}
