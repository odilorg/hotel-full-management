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
        
        $url = 'https://api.exchangerate.host/convert?from=USD&to=UZS&date='.$a;
        $response_json = file_get_contents($url);
        
        
        if(false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if($response->success === true) {
                    
                    return $kurs_dol =  floatval($response->result) +20;
                    
                }
            } catch(Exception $e) {
                return session()->flash('error', 'Exchange website is down');
                //dd(session('error'));
                return redirect('cargos');
            }
        } 

    }


    use HasFactory;
    protected $guarded = [];

   


}
