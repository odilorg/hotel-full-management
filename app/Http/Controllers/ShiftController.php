<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        
                     
        $shifts = Shift::paginate();
   //dd("shifts");
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        
        return view('shifts.create');
    }

    public function store(Request $request)
    {
        $attributes =  request()->validate([
            'saldo' => ['required', 'numeric'],
            'rate_usd' => ['required','numeric'],
            

        ]);

        //dd($attributes);
        $attributes['user_id'] = auth()->user()->id;             
        Shift::create($attributes);
         session()->flash('success', 'New Shift Created');
         session()->flash('type', 'New Shift');

        return redirect('shifts');
    }
}
