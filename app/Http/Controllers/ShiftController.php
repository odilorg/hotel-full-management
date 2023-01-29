<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShiftController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();  
         $id = Auth::id();   
         $shift = Shift::where('user_id', $id)->first();
         //dd($shift);   
   
         return view('shifts.index', compact('shift', 'hotels'));
   
   
//          if ($shift) {
//     dd('shift exist');
//     return view('shifts.index', compact('shift', 'hotels'));
//    } else {
//     return view('shifts.index', compact('hotels'));
//    }
   
   
             
     

//dd($shift);
       
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
       $id = Auth::id();
     //dd($id);
       $shift = Shift::where('user_id', $id)->first();
       //check if shift opne or closed
       //dd($shift);
       if ($shift and $shift->status == '1' ) {
        dd('shift is not closed');
         
       } else {
       //  dd($request->input('hotel_id'));
        $attributes =  request()->validate([
            'hotel_id' => ['required', 'numeric'],
           
            

        ]);


      // dd($attributes);
       $attributes['status'] = '1';
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
}
