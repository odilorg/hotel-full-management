<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beds24booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Beds24bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //dd("index24");
        return view('beds24bookings.index');
    }
    public function getbookings()
    {
// make requests using laravel Http facade

    $attributes2 =  request()->validate([

    'from_date' => ['required '],
    'to_date' => ['required'],
  ]);
    $from_date =  str_replace('-', '', $attributes2['from_date']);
    $to_date =  str_replace('-', '', $attributes2['to_date']);
    $bedsapi = $_ENV['BEDS24API'];
    $bedsProkey = $_ENV['BEDS24PROPKEY'];
//dd(gettype($bedsapi));
    $response = Http::post('https://api.beds24.com/json/getBookings', [
    
    "authentication" => [
        "apiKey" => $bedsapi,
        "propKey" => $bedsProkey
    ],
    "arrivalFrom" => $from_date,
    "arrivalTo" => $to_date,
    "includeInvoice" => true,
    "status" => "1",
    
    
  
    
    
]);

    $bookings = $response->object();
    // $payment_due = $bookings[0]->invoice[0]->price;
    // $payment = $bookings[0]->invoice[1]->price;
    dd($bookings);
    dd($response->status());
       
       
       
        return view('beds24bookings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beds24webhookupdated(Request $request)
    {
        $fullname = $request->header('fullname');
        $referer = $request->header('referer');
        $payment = htmlentities($request->header('payment'));
        $position_status = strrpos($payment, "conf_status")+16;
        $position_status2 = strrpos($payment, "conf_gap")+103;

        //get payment status
        $part_cut = substr($payment, $position_status, 6);
        $part_cut = str_replace('&', '', $part_cut);
        $status = preg_replace('/\s+/', '', $part_cut);
        $ready_status = trim($part_cut,";&");
        //get payment description
        $part_cut2 = substr($payment, $position_status2, 20);
        //$part_cut2 = str_replace('&', '', $part_cut2);
      //  $status2 = preg_replace('/\s+/', '', $part_cut2);
        $ready_status2 = trim($part_cut2,"; ");
        // $start = strrpos($payment, "conf_gap")+104;
        // $start_word = substr($payment, $start, 20);
        // $len = strrpos($start_word, "&");
        // $desc = substr($start_word, $start, $len);
        
        //$desc = str_replace('&', '', $desc);
       // $payment_description = preg_replace('/\s+/', '', $desc);

        $status = $request->status;
        $bookid = $request->bookid;


        if ($status == "modify" || $status == "new") {
           
            // $bookid = $request->header('bookingid');
            // $attributes['guestName'] = $fullname;
            Beds24booking::updateOrCreate(
                ['bookid' => $bookid],
                ['guestName' => $part_cut2,
                'referer' => $ready_status,
                'payment_method' => $ready_status2
               
                
                ]


            );
           
           // $attributes['bookId'] = $bookid;
           // $beds24booking->update($attributes);
        } else {
            Beds24booking::where('bookid', $bookid)->delete();
            
        } 
        //dd($key);
        

        // foreach ($headers as $key => $value) {
        //     $attributes['guestFirstName'] = $value;
        // }
        
        // $json = file_get_contents('php://input');
        // Storage::disk('local')->put('file.txt', $json);
        // Storage::disk('local')->put('request.txt', Request::header('x-wc-webhook-source'));
    }
    public function create()
    {
        //
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
     * @param  \App\Models\Beds24booking  $beds24booking
     * @return \Illuminate\Http\Response
     */
    public function show(Beds24booking $beds24booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beds24booking  $beds24booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Beds24booking $beds24booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beds24booking  $beds24booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beds24booking $beds24booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beds24booking  $beds24booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beds24booking $beds24booking)
    {
        //
    }
}
