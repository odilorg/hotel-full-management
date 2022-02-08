<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Room;
use App\Models\Report;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $rooms = DB::table('rooms')

        ->join("reservations",function($join){
            $join->on("reservations.roomId","=","rooms.room_id")
                ->on("reservations.unitId","=","rooms.unit_id");
               

               
        })
       
        ->orderBy('reservations.firstNight', 'desc')
        ->paginate(5);

        // dd($rooms);
        // $reports = DB::table('reservations')
           
        // ->join('reports', 'report_id', '=', 'reports.id')
        //     ->get();
           
            // $merged = $rooms->merge($reports);

            
            // dd($rooms);
            // dd($reports);
    // $reservations = Reservation::get();
    //  dd($rooms);
    //  $w[] = array_merge($rooms, $reservations );
    //  dd($w);
     return view('reservations.index', compact('rooms'));
    }
    public function beds24()
    {
        $attributes2 =  request()->validate([

            'from_date' => ['required '],
            'to_date' => ['required'],
          ]);
          $attributes2['from_date'] =  str_replace('-', '', $attributes2['from_date']);
          $attributes2['to_date'] =  str_replace('-', '', $attributes2['to_date']);
          
        
        $auth = array();
        $auth['apiKey'] = 'klfsdjkfkksdj234234';
        $auth['propKey'] = 'hfgtryrt43534sadfsdf';
        
        $data = array();    
        $data['authentication'] = $auth;
        
        /* Restrict the bookings using any combination of the following */
       
        $data['arrivalFrom'] =  $attributes2['from_date'];
        $data['arrivalTo'] = $attributes2['to_date'];
        $data['status'] = '1';

        $json = json_encode($data);
       // dd($json);
        $url = "https://api.beds24.com/json/getBookings";
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        curl_close ($ch);
        $response = json_decode($result);
//get data from Beds24 DB
        $beds = array();
   //    dd($response);
        foreach ($response as $key => $value) {
           $attributes['guestFirstName'] = $value->guestFirstName;
           $attributes['guestName'] = $value->guestName;
           $attributes['unitId'] = $value->unitId ;
           $attributes['roomId'] = $value->roomId ;
           $attributes['firstNight'] = $value->firstNight ;
           $attributes['lastNight'] = $value->lastNight ;
           $attributes['numAdult'] = $value->numAdult ;
           $attributes['price'] = $value->price ;
           $attributes['price_uzs'] = $value->price * Reservation::exchange($value->firstNight);
           $attributes['commission'] = $value->commission ;
           $attributes['referer'] = $value->referer ;
         // dd(Reservation::where('bookId', $value->bookId )->count() == 0);
        if (Reservation::where('bookId', $value->bookId )->count() > 0) {
            session()->flash('error', 'This reservation exists');
            return redirect('reservations');
        } else {
            $attributes['bookId'] = $value->bookId;
        }
           Reservation::create($attributes);
        }
        session()->flash('success', 'Beds24 created');
        session()->flash('type', 'Beds24');

       return redirect('reservations'); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $attributes =  request()->validate([

            'guestFirstName' => ['required ', 'max:255'],
            'guestName' => ['max:255'],
            'bookId' => ['required'],
            'roomId' => ['required'],
            'firstNight' => ['required' ],
            'lastNight' => ['required' ],
            'numAdult' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'referer' => ['required' ],
            'payment_method' => ['max:255' ],
            'company_name' => ['max:255' ],
        ]);
        $attributes['price_uzs'] = $attributes['price'] * Reservation::exchange($attributes['firstNight'] );
        Reservation::create($attributes);
        session()->flash('success', 'Booking created');
        session()->flash('type', 'New Booking');

       return redirect('reservations'); 
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
    public function edit(Reservation $reservation)
    {
     //  
      
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $attributes =  request()->validate([

          
            'payment_method' => ['required', 'max:255' ],
            'company_name' => ['max:255' ],
            'price' => ['required', 'numeric'],
            'report_number' => ['max:255'],
        ]);
        $attributes['price_uzs'] = $attributes['price'] * Reservation::exchange($reservation->firstNight);
        $reservation->update($attributes);
        session()->flash('success', 'Booking updated');
        session()->flash('type', 'Booking');
 
        
        return redirect('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        session()->flash('error', 'Booking Deleted');
        session()->flash('type', 'Booking Deleted');

        return redirect('reservations');
    }

    public function report(Request $request) {
       
        $report = array();
        $report_number = $request->input('report_number');
        
        $report['total_report_number'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->sum('price');
        $report['total_naqd'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->where('payment_method','Naqd')
                            ->sum('price');
                            
        $report['total_karta'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->where('payment_method','Karta')
                            ->sum('price');

        $report['total_perech'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->where('payment_method','Karta')
                            ->sum('price');
        $report['total_booking_comission'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->where('referer','Booking.com')
                            ->sum('commission');                    
      
        // $report['total']        = DB::table('reservations')
        //                              ->sum('price');
      
       // dd($report);

return view('reservations.report', compact('report'));
    }

    public function report_range(Request $request) {
        $report = array();
        $arrival_from = $request->input('from_date');
        $arrival_to = $request->input('to_date');
//Query
$report['total_report'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
    ->sum('price');  
    
$report['total_naqd'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
    ->where('payment_method','Naqd')    
    ->sum('price');  
    
$report['total_karta'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
    ->where('payment_method','Karta')    
    ->sum('price'); 
$report['total_perech'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
    ->where('payment_method','Perech')    
    ->sum('price'); 

$report['total_booking_comission'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
    ->where('referer','Booking.com')   
    ->sum('commission');
    
    return view('reservations.report-range', compact('report'));
    //dd($report['total_naqd']);

     
                            

    }
}
