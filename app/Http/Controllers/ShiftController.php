<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();        
                     
     $shifts = Shift::paginate();

//dd($shifts);
        return view('shifts.index', compact('shifts', 'hotels'));
    }

    public function create()
    {
        
        return view('shifts.create');
    }
    public function show()
    {
        
        dd('show shift');
    }

    public function start(Request $request)
    {
       // dd($request);
        $attributes =  request()->validate([
            'hotel_id' => ['numeric'],
          
            

        ]);

       //dd($attributes);
        $attributes['user_id'] = auth()->user()->id;     
        // dd($attributes);
        // dd($request->input('hotel_id'));
        // $attributes['user_id'] = request('')
        Shift::create($attributes);
         session()->flash('success', 'New Shift Created');
         session()->flash('type', 'New Shift');
//dd('shift created');
        return redirect('shifts');
    }
}
