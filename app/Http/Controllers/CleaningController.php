<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class CleaningController extends Controller
{
    public function cleaning()
    {
        //dd('hekko');
        return view('cleaning.cleaning');
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
        $xona = $request->input('xona');
        $propert_id = $request->input("property_id");
        // set room status to READY from posting to 
        // getiing room id and unit id
        // $propert_id = Hotel::where('property_id', )
        
        
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
