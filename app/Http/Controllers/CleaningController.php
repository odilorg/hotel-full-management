<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Beds24booking;
use Illuminate\Support\Facades\Http;

class CleaningController extends Controller
{
    public function cleaning()
    {
      
        $rooms_jahongir = Room::where('hotel_id', 1)
        ->orderBy('room_number', 'asc')
        ->get();
        $rooms_premium = Room::where('hotel_id', 2)
        ->orderBy('room_number', 'asc')
        ->get();
     //   dd($rooms);
        return view('cleaning.cleaning', compact('rooms_jahongir', 'rooms_premium'));
    }

    // public function cleaning_notready (Request $request)
    // {
    //     //php code to send the message to Telegram Channel
    //     $xona = $request->input('xona');
    //     $apiToken = "";
    //     $data = [
    //         'chat_id' => '-1001570852064',
    //         'text' => $xona." Xona Tayor Emas",
    //     ];
    //     $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    //     // return view('cleaning.cleaning');
    //     session()->flash('success', 'Raxmat');
    //     session()->flash('type', 'Yangi Cargo');
    //     return back();
    // }
    public function cleaning_ready(Request $request)
    {
        $name = auth()->user()->name;
        $telegram_api = $_ENV['TELEGRAMAPI'];
        $room_id = $request->input('room_id');

    //   /  dd($room_id);
        $propert_id = $request->input("property_id");
        // set room status to READY from posting to 
        // getiing room id and unit id
        //date_default_timezone_set("Asia/Tashkent");
         //$propert_id = Room::where('room_number', $room_id)->first();
$room = Room::find($room_id);
//dd($room->room_name);
        //  $booking_id = Beds24booking::where('lastNight', date("Y-m-d"))
        //  ->where('room_id', $room_id)
        //  ->first();
       //  dd($booking_id);
        $xona = $room->room_number;

        // dd($booking_id->bookId);
//set beds24 booking room status

$bedsapi = $_ENV['BEDS24API'];
$bedsProkey = $_ENV['BEDS24PROPKEY2'];
//dd(gettype($bedsapi));
//dd($booking_id->bookId);

$response = Http::post('https://api.beds24.com/json/setProperty', [



    "authentication" => [
    "apiKey" => $bedsapi,
    "propKey" => $bedsProkey
],

"setProperty" => [
    [
        "action" => "modify",
        "roomTypes" => [
            [
                "action" => "modify",
                "roomId" => $room->room_id,
                "units" => [
                    $room->unit_id => [
                        "unitStatusColor" => "#1578db",
                        "unitStatusText" => "clean"
                    ]
                ]
            ]
        ]
    
    ]
    
    
]



]);


   //  dd($response);   
        
        // $response = Http::post('http://example.com/users', [
        //     'name' => 'Steve',
        //     'role' => 'Network Administrator',
        // ]);
       // dd($xona);
        //php code to send the message to Telegram Channel
        $now = date("d-m-Y H:m:s");
        $new_time = date("d-m-Y H:i:s", strtotime('+5 hours', strtotime($now)));
        $apiToken = $telegram_api;
        $data = [
            'chat_id' => '-653810568',
            'text' =>  $xona ." Xona Tayor ". $new_time . " by " .$name,
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
        session()->flash('success', 'Raxmat');
        session()->flash('type', ' Xona Xolati');
        return back();
    }
}
