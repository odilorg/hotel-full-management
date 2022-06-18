<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CleaningController extends Controller
{
    public function cleaning ()
    {
        //dd('hekko');
        return view('cleaning.cleaning');
    }

    // public function cleaning_notready (Request $request)
    // {
    //     //php code to send the message to Telegram Channel
    //     $xona = $request->input('xona');
    //     $apiToken = "1750871148:AAE82UE_OMk_FskoJh61wfT6Oowf6i4RwHk";
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
    public function cleaning_ready ( Request $request)
    {
        
        $xona = $request->input('xona');
       // dd($xona);
        //php code to send the message to Telegram Channel

        $apiToken = "5323496366:AAEi_xDnyz2uwL7YNS1p7ayDxz854LH-HTg";
        $data = [
            'chat_id' => '-653810568', 
            'text' =>  $xona ." Xona Tayor ". now(),
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );  
        session()->flash('success', 'Raxmat');
        session()->flash('type', ' Xona Xolati');
        return back();
    }
}
