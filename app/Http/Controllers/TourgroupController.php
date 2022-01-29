<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guide;
use App\Models\Ticket;
use App\Models\Tourgroup;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Hotelreservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TourgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->paginate(13);
       
     
    // dd($tourgroups);
       
      return view('tourgroups.index', compact('tourgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tourgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $attributes =  request()->validate([
            'tourgroup_name' => ['required', 'max:255'],
             'tourgroup_country' => ['required', 'max:255'],
             'tourgroup_pax' => ['required', 'numeric', 'max:255'],
             'tourgroup_ci' => ['required', 'max:255'],
             'tourgroup_co' => ['required', 'max:255'],
             'tourgroup_status' => ['required', 'max:255']
        ]);
        
        //dd($request->get('tour_id'));
        // $attributes['tourgroup_ci'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_ci)->format('Y-m-d');
        // $attributes['tourgroup_co'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_co)->format('Y-m-d');
    //    // $attributes['tourgroup_id'] =$request->get('tour_id');
    $attributes['user_id'] = auth()->user()->id; 
       (Tourgroup::create($attributes));
        
         session()->flash('success', 'Tour reservation has been created');
         session()->flash('type', 'Tour Reservation');
         

        return redirect('tourgroups');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tourgroup $tourgroup)
    {
        
        
        // $transports = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
        //     ->join('hotelreservations', 'hotelreservations.tourgroup_id', '=', 'tourgroups.id')
        //     ->join('guides', 'guides.tourgroup_id', '=', 'tourgroups.id')
        //     ->join('restaurants', 'restaurants.tourgroup_id', '=', 'tourgroups.id')
        //     ->join('tickets', 'tickets.tourgroup_id', '=', 'tourgroups.id')
        //     ->where('user_id', '=', auth()->user()->id)
        //     ->where('tourgroups.id', '=', $tourgroup->id)
        //     ->select([
        //         'tourgroups.*',
        //         'transports.*',
        //         'hotelreservations.*',
        //         'guides.*',
        //         'restaurants.*',
        //         'tickets.*',
                 
        //            ])
        //     ->get();
        $transports_auto = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->where('transports.transport_type', '=', 'Auto')
            ->select([
                
                'transports.*',
                
                 
                   ])
            ->get();
            $transports_air = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->where('transports.transport_type', '=', 'Air')
            ->select([
                
                'transports.*',
                
                 
                   ])
            ->get();
            $transports_train = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->where('transports.transport_type', '=', 'Train')
            ->select([
                
                'transports.*',
                
                 
                   ])
            ->get();
            $hotels = Tourgroup::join('hotelreservations', 'hotelreservations.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->select([
                
                'hotelreservations.*',
                
                 
                   ])
            ->get();
            $guides = Tourgroup::join('guides', 'guides.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->select([
                
                'guides.*',
                
                 
                   ])
            ->get();
            $restaurants = Tourgroup::join('restaurants', 'restaurants.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->select([
                
                'restaurants.*',
                
                 
                   ])
            ->get();
            $tickets = Tourgroup::join('tickets', 'tickets.tourgroup_id', '=', 'tourgroups.id')
            
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->select([
                
                'tickets.*',
                
                 
                   ])
            ->get();
  // dd(empty($transports_air));
        return view('tourgroups.show', compact(
            'transports_train',
            'transports_auto',
            'transports_air', 
            'tourgroup', 
            'hotels',
            'tickets',
            'restaurants', 
            'guides'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourgroup = Tourgroup::find($id);
      
        return view('tourgroups.edit')->with([
            'tourgroup' =>$tourgroup
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tourgroup $tourgroup, Request $request)
    {
        $attributes =  request()->validate([
            'tourgroup_name' => ['required', 'max:255'],
             'tourgroup_country' => ['required', 'max:255'],
             'tourgroup_pax' => ['required','numeric', 'max:255'],
             'tourgroup_ci' => ['required', 'max:255'],
             'tourgroup_co' => ['required', 'max:255'],
             'tourgroup_status' => ['required', 'max:255']
        ]);
        // $attributes['tourgroup_ci'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_ci)->format('Y-m-d');
        // $attributes['tourgroup_co'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_co)->format('Y-m-d');
       // dd($attributes);
        $tourgroup->update($attributes);
        
        return redirect('tourgroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourgroup $tourgroup)
    {
        $tourgroup->delete();
        return redirect('tourgroups');
    }
    public function status(Tourgroup $tourgroup)
    {
       
        $status = Tourgroup::join('transports', 'transports.tourgroup_id', '=', 'tourgroups.id')
            ->join('hotelreservations', 'hotelreservations.tourgroup_id', '=', 'tourgroups.id')
            ->join('guides', 'guides.tourgroup_id', '=', 'tourgroups.id')
            ->join('restaurants', 'restaurants.tourgroup_id', '=', 'tourgroups.id')
            ->join('tickets', 'tickets.tourgroup_id', '=', 'tourgroups.id')
            ->where('user_id', '=', auth()->user()->id)
            ->where('tourgroups.id', '=', $tourgroup->id)
            ->select([
                'tourgroups.tourgroup_status',
                'transports.transport_status',
                'hotelreservations.*',
                'guides.guide_status',
                'restaurants.restaurant_status',
                'tickets.ticket_status',
                 
                   ])
            ->get();
        return view('tourgroups.status', 'status');
        // $tourgroup->delete();
        // return redirect('tourgroups');
    }
}
