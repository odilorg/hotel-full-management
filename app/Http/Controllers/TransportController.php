<?php

namespace App\Http\Controllers;

use ArrayIterator;
use MultipleIterator;
use App\Models\Itinarary;
use App\Models\Tourgroup;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$transports = Transport::all();
        $transports = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
                    ->where('user_id', '=', auth()->user()->id)
              		->select(['transports.transport_type',
                            'transports.pickup_or_dropoff_date_time',
                            'tourgroups.tourgroup_name',
                            'transports.extra_info', 
                            'transports.transport_status', 
                            'transports.pickup_or_dropoff_from', 
                            'transports.pickup_or_dropoff_to',
                            'transports.id',
                              ])
                    ->paginate(13);
        return view('transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
        return view('transports.create', compact('tourgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Transport $transport, Request $request)
    {
        $attributes =  request()->validate([
            'transport_status' => ['required'],
            'transport_type' => ['required'],
            'auto_type' => ['max:255'],
            'car_make'=> ['max:255'],
            'train_name' => ['max:255'],
            'train_ticket_class' => ['max:255'],
            'air_ticket_class'=> ['max:255'],
            'extra_info_transport' => ['max:255'],          
            'pickup_or_dropoff_or_marshrut' => ['required'],
            'extra_info' => ['max:255'],          
            'pickup_or_dropoff_from' => ['required', 'max:255'],
            'pickup_or_dropoff_to' => ['required', 'max:255'],
            'driver_name' => ['max:255'],
            'driver_tel' => ['max:255'],
            'pickup_or_dropoff_date_time' => ['required'],
        ]);
       
       

    //    dd($itin);
    $attributes['tourgroup_id'] =$request->get('tourgroup_id');
   // dd($transport);
    (Transport::create($attributes));
    session()->flash('success', 'Transport reservation has been created');
    session()->flash('type', 'Trasport Reservation');
       return redirect('transports');   
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
    public function edit(Transport $transport)
    {
        $tourgroup_name = $transport->tourgroup->tourgroup_name;
        $transports = $transport;
         $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
         return view('transports.edit', compact('transports', 'tourgroups', 'tourgroup_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        //dd('delete');
        $transport->delete();
        return redirect('transports');
    }

    public function auto()
    {
       
    }





}
