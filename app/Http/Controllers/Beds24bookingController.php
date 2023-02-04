<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Room;
use PHPHtmlParser\Dom;
use Illuminate\Http\Request;
use App\Models\Beds24booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Beds24bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parsehtml()
    {
        
        $room_id = Room::where('room_id', "377302")
        ->where('room_number', "16" )
        ->first();
        dd($room_id->id);
        
        $dom = new Dom;
        $str = <<<EOD
        <table cellspacing="5" style="font-family:inherit;font-size:inherit;font-style:inherit;font-weight:inherit;font-size:inherit;text-align:left;border-spacing:0;" class="confirmationtable"><tr><td style='font-weight:bold;padding: 0 10px 0 0' class='conf_subheader'>Description </td><td> </td></tr><tr><td style='padding: 0 10px 0 0'>Double or Twin Thursday, 12 January, 2023 - Sunday, 15 January, 2023 </td><td style='padding: 0 10px 0 0' class='conf_status'> </td></tr></table>
EOD;
        $dom->loadStr($str);
        $payment_description = $dom->find('td')[1];
        $payment_method = $dom->find('td')[6];
        dd(($payment_description)) ; // "click here"
        return view('beds24bookings.index');
    }

    public function index()
    {
   // $utility_usages = DB::table('utility_usages')
        //     ->join('meters', 'utility_usages.meter_id', '=', 'meters.id')
        //     ->join('utilities', 'utility_usages.utility_id', '=', 'utilities.id')
        //     ->select('utility_usages.*',  'utilities.utility_name', 'meters.meter_number')
        //     ->get();
        // ->join('contacts', function ($join) {
        //     $join->on('users.id', '=', 'contacts.user_id')
        //          ->where('contacts.user_id', '>', 5);
        // })
        
        
       $beds24bookings = DB::table('rooms')
            ->join('beds24bookings', 'rooms.id', '=', 'beds24bookings.room_id')
            ->join('hotels', 'rooms.hotel_id', '=', 'hotels.id')
            ->select('rooms.*',  'beds24bookings.*', 'hotels.hotel_name')
            ->orderBy('beds24bookings.firstNight', 'desc')           
            ->paginate(25);

       //$beds24bookings = Beds24booking::with('room.hotel')->orderBy('firstNight', "asc")->paginate(15);
    //    $hotel_names = Room::where('hotel_id', )
 //dd($beds24bookings); 
       //$beds24bookings = Beds24booking::paginate(14);
    //   dd($beds24bookings->room->room_name); 
       //dd("index24");
        return view('beds24bookings.index', compact('beds24bookings'));
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
    $response = Http::get('https://api.beds24.com/json/getBookings', [
    
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
        $htmltext = $request->header('invoicedesc');
        $fullname = $request->header('fullname');
        $referer = $request->header('referer');
        $room_id = $request->header('roomid');
        $room_number = $request->header('roomnumber');
        $checkinday = $request->header('checkinday');
        $checkoutday = $request->header('checkoutday');
        $numadults = $request->header('numadults');
        $bookingcommision = $request->header('bookingcommision');
        $invoiceamount = $request->header('invoiceamount');
        $paid_amount = $request->header('paidamount');
        $invoice_balance = $request->header('invoicebalance');

        $status = $request->status;
        $bookid = $request->bookid;

        $room_id = Room::where('room_id', $room_id)
        ->where('room_number', $room_number )
        ->first();
        
//parser working here
//   // Creating an object


// // Property added to the object
// $payment_method->text = '';
// $payment_description->text = '';
$dom = new Dom;
$dom->loadStr($htmltext);
$payment_description = $dom->find('td')[5];
$payment_method = $dom->find('td')[6];
if (is_null($payment_description)) {
    $payment_description = new stdClass();
    $payment_description->text = '';
}
if (is_null($payment_method)) {
    $payment_method = new stdClass();
    $payment_method->text = '';
}

//$payment_balance = floatval($invoiceamount) - floatval($paid_amount);
//dd(($a->text)) ; // "click here"


        if ($status == "modify" || $status == "new") {
           
            // $bookid = $request->header('bookingid');
            // $attributes['guestName'] = $fullname;
            Beds24booking::updateOrCreate(
                ['bookid' => $bookid],
                ['guestName' => $fullname,
                'payment_method' => ($payment_method->text),
                'payment_description' => ($payment_description->text),
                'referer' => $referer,
                'guestName' => $fullname,
                'numAdult' => $numadults,
                'commission' => $bookingcommision,
                'firstNight' => $checkinday,
                'lastNight' => $checkoutday,
                'room_id' => $room_id->id,
                'price' => $invoiceamount,
                'paid_amount' => $paid_amount,
                'payment_balance' => $invoice_balance,
                
                
               
                
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
    public function beds24web_checkout(Request $request)
    {
       
       $htmltext = $request->all();
        $hotel_id = $request->header('propertyid');
       $room_name = $request->header('room_name');
      info('df', $htmltext);
        if ($hotel_id == 41097) {
           
             $apiToken = $_ENV['TELEGRAMAPIJAHONGIR'];
            $chat_id = $_ENV['CHAT_ID_JAHONGIR'];
        
        }else {
           
             $apiToken = $_ENV['TELEGRAMAPIPREMIUM'];
            $chat_id = $_ENV['CHAT_ID_PREMIUM'];
        }


        $data = [
            'chat_id' => $chat_id,
            'text' =>  $room_name ." Xona Ketdi ". now() . " by Odil" ,
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
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
