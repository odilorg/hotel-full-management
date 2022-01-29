<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Tourgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = auth()->user()->id;

        $tickets = Ticket::with(['tourgroup'])
       ->whereHas('tourgroup', function($q) use($value) {
       $q->where('user_id', '=', $value); 
        })
        ->paginate(13);
        
    //    / dd($guides);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
        return view('tickets.create', compact('tourgroups'));
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

            'ticket_location' => ['required ', 'max:255'],
            'monument_name' => ['max:25'],
            'voucher_number' => ['max:255'],
            'ticket_date' => ['required', 'max:255'],
            'ticket_extra_info' => ['max:255'],
            'ticket_status' => ['required ', 'max:255'],
            'ticket_file' => ['nullable', 'image', 'max:1000'],
            'tourgroup_id' => ['required'],
        ]);
        //$catalog = rand(1, 878547);
        if (isset($attributes['ticket_file'] )) {
            $attributes['ticket_file'] = request()->file('ticket_file')->store('ticket_file');
        }
        
        Ticket::create($attributes);
        session()->flash('success', 'Ticket has been added');
        session()->flash('type', 'New Ticket');

       return redirect('tickets'); 
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
    public function edit(Ticket $ticket)
    {
        $tourgroup_name = $ticket->tourgroup->tourgroup_name;
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('tickets.edit', compact('ticket', 'tourgroups', 'tourgroup_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $attributes =  request()->validate([

            'ticket_location' => ['required ', 'max:255'],
            'monument_name' => ['max:25'],
            'voucher_number' => ['max:255'],
            'ticket_date' => ['required', 'max:255'],
            'ticket_extra_info' => ['max:255'],
            'ticket_status' => ['required ', 'max:255'],
            'ticket_file' => ['nullable', 'image', 'max:1000'],
            'tourgroup_id' => ['required'],
        ]);
        if (isset($attributes['ticket_file'])) {
            $attributes['ticket_file'] = request()->file('ticket_file')->store('ticket_file');
          }
        $ticket->update($attributes);
        
        return redirect('tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('tickets');
    }
}
