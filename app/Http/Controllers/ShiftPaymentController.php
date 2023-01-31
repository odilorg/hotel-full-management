<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Shift;
use App\Models\PaymentType;
use App\Models\ShiftPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShiftPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentType::get();
        return view('shift_payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift = Shift::where('user_id', Auth::id())->first();
        $payments = PaymentType::get();
        $rooms = Room::where('hotel_id', $shift->hotel_id)->orderBy('room_number', 'asc')->get();
        return view('shift_payments.create', compact('payments', 'rooms', 'shift'));
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

            'payment_description' => ['max:255' ],
            'payment_amount_uzs' => ['required', 'numeric'],
            'room_id' => ['required ', 'numeric'],
            'payment_type_id' => ['required', 'numeric'],
   
        ]);
        $shift = Shift::where('user_id', auth()->user()->id)->first();
      
        $attributes['user_id'] = $shift->user_id;
        $attributes['hotel_id'] = $shift->hotel_id;
       // dd($attributes);
       ShiftPayment::create($attributes);
       session()->flash('success', 'Payment has been added');
       session()->flash('type', 'New Payment');
       
       return redirect()->route('shifts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShiftPayment  $shiftPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ShiftPayment $shiftPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShiftPayment  $shiftPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ShiftPayment $shiftPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShiftPayment  $shiftPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShiftPayment $shiftPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShiftPayment  $shiftPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShiftPayment $shiftPayment)
    {
        //
    }
}
