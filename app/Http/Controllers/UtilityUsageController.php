<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meter;
use App\Models\Company;
use App\Models\Utility;
use App\Models\UtilityUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

class UtilityUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$utility_ids =  UtilityUsage::get();

        // $utility_usages = DB::table('utility_usages')
        //     ->join('meters', 'utility_usages.meter_id', '=', 'meters.id')
        //     ->join('utilities', 'utility_usages.utility_id', '=', 'utilities.id')
        //     ->select('utility_usages.*',  'utilities.utility_name', 'meters.meter_number')
        //     ->get();
         $utility_usages = UtilityUsage::orderBy('usage_date', 'DESC')
         ->paginate(15);
         $utilities = Utility::all();
         
        //dd($utility_usages->meter->utility->get);

        //$meters = Meter::all();
      //dd($utility_usages);


        return view('utility_usages.index', compact('utility_usages', 'utilities'));
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
            'meter_image' => ['image'],
            'meter_id' => ['required', 'numeric'],
            
        ]);

        $utility_id = Meter::where('id', $attributes['meter_id'])->first();
        $attributes['utility_id'] =  $utility_id->utility_id;
       // dd($attributes['utility_id']);
        $attributes['meter_difference'] = $attributes['meter_latest'] - $attributes['meter_previous'];
        if (isset($attributes['meter_image'])) {
            $attributes['meter_image'] = request()->file('meter_image')->store('meter_image');
        }
        // $attributes['meter_image'] = request()->file('meter_image')->store('meter_image');
      //  dd($attributes);
             
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
        $company = Company::where('company_inn', 300965341)->first();
        $sana = $utilityUsage->usage_date;
        $meter_id = $utilityUsage->meter_id;
        $meters_svet =[];
        $meters = [];
        
        if ($meter_id == 1 || $meter_id == 2 ) {
        
            $usage = DB::table('utility_usages')
            ->where('usage_date' ,$sana)
            ->whereIn('meter_id', [1,2] )
            
            ->get();
            //dd($usage);
            
            $utility_name = $utilityUsage->meter->utility; 
             $meters_svet = Meter::where('utility_id', 2)->get();
             
        } else {
            $utility_name = $utilityUsage->meter->utility;
        $meters = $utilityUsage->meter;
        $usage = $utilityUsage;    
        }
        
      
     //$meters = $meters->toArray();
       // dd($meters);
       //$t = Utility::find($utilityUsage->meter_id)->utilityUsages->first();
      // dd($utilityUsage->meter);

    //    $meters = Meter::where('id', $utilityUsage->meter_id)->first();
    //    $utility_name = Utility::where('id', $meters->utility_id)->first();

     //  dd($utility_name->utility_name);
     //Date::setLocale('uz');
     
     //$date = Carbon::createFromFormat('Y-m-d', $utilityUsage->usage_date);
        $sana = Carbon::createFromFormat('Y-m-d', $utilityUsage->usage_date)
                    ->format('m');
     //dd(substr($sana) );
        $_monthsList = array(
        "01"=>"Январ","02"=>"Феврал","03"=>"Март",
        "04"=>"Апрел","05"=>"Май", "06"=>"Июн",
        "07"=>"Июл","08"=>"Август","09"=>"Сентябрь",
        "10"=>"Октябр","11"=>"Ноябр","12"=>"Декабр");
       
        $sana = $_monthsList[$sana];
       
    // / dd($sana);
     
        return view('utility_usages.show', compact('meters_svet', 'company', 'utility_name', 'usage', 'utilityUsage', 'meters', 'sana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(UtilityUsage $utilityUsage)
    {
       // $utility_name = $utilityUsage->meter->utility;
        //$meters = $utilityUsage->meter;
        
        // $meter_id_utility_name = DB::table('meters')
        // ->where('meters.id', $utilityUsage->meter_id)
        // ->join('utilities', 'meters.utility_id', '=', 'utilities.id')
        // ->select('utilities.*', 'meters.id as meterid', 'meters.meter_number')
        // ->first();
     //dd($utilityUsage->meter->utility->utility_name);
        return view('utility_usages.edit', compact('utilityUsage'));
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
        $attributes =  request()->validate([
            'usage_date' => ['required'],
            'meter_latest' => ['required','numeric'],
            'meter_previous' => ['numeric', 'required'],
            'meter_image' => ['image'],
            'meter_id' => ['required', 'numeric'],
            
        ]);
        $attributes['meter_difference'] = $attributes['meter_latest'] - $attributes['meter_previous'];
       

        if (isset($attributes['meter_image'])) {
            $attributes['meter_image'] = request()->file('meter_image')->store('meter_image');
        }
        //dd($attributes);
             
        $utilityUsage->update($attributes);
     
         session()->flash('success', 'New Usage Created');
         session()->flash('type', 'New Usage');

        return redirect('utility_usages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UtilityUsage  $utilityUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UtilityUsage $utilityUsage)
    {
        $utilityUsage->delete();
        session()->flash('success', 'Usage Deleted');
        session()->flash('type', 'Delete Usage');
        return redirect('utility_usages');
    }

    public function tabiiygaz()
    {
      //dd('gaz');
     
        $utility_usages = UtilityUsage::where('meter_id', 3)->orderBy('usage_date', 'desc')->paginate(15);
        $utilities = Utility::all();

        return view('utility_usages.index', compact('utility_usages', 'utilities'));
    }

    public function elektr()
    {
      
        $utility_usages = UtilityUsage::whereIn('meter_id', [1,2])->orderBy('usage_date', 'desc')->paginate(15);
        $utilities = Utility::all();
        return view('utility_usages.index', compact('utility_usages', 'utilities'));
    }

    public function suvoqova()
    {
        $utility_usages = UtilityUsage::where('meter_id', 4)->orderBy('usage_date', 'desc')->paginate(15);
        $utilities = Utility::all();
        return view('utility_usages.index', compact('utility_usages', 'utilities'));
    }
}
