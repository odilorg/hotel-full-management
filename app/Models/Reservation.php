<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{


    public static function exchange($exchange_date) {
        $a = date_create($exchange_date);
        $a = date_format($a,"Y-m-d" );
        
        //dd($a);
        //kurs from cbu Uz + 100 som
        
        //$url = 'https://api.exchangerate.host/convert?from=USD&to=UZS&date='.$a;
        $url = 'https://cbu.uz/ru/arkhiv-kursov-valyut/json/USD/'.$a;
        $response_json = file_get_contents($url);
        // $response = json_decode($response_json);
        // $kurs_dol =  floatval($response[0]->Rate) +20;
        // dd(gettype($response_json));
        // if($response_json != '') {
        //     dd('not empty');
        // } else {
        //     dd('empty');
        // }



        if($response_json != '') {
            try {
                $response = json_decode($response_json);
               
                    
                   // dd($response[0]);
                    return $kurs_dol =  floatval($response[0]->Rate) +20;
                    
                    
               
            } catch(Exception $e) {
                return session()->flash('error', 'Exchange website is down');
                //dd(session('error'));
                return redirect('home');
            }
        } 

    }


    use HasFactory;
    protected $guarded = [];

   


}
