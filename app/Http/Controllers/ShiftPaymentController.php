<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Models\ShiftPayment;
use Illuminate\Http\Request;

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
       
        return view('shift_payments.create', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
