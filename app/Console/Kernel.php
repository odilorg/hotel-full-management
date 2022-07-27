<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // $attributes2 =  request()->validate([

            //     'from_date' => ['required '],
            //     'to_date' => ['required'],
            //   ]);
            //   $attributes2['from_date'] =  str_replace('-', '', $attributes2['from_date']);
            //   $attributes2['to_date'] =  str_replace('-', '', $attributes2['to_date']);
              
            
            $auth = array();
            $auth['apiKey'] = $_ENV['BEDS24API'];
            $auth['propKey'] = $_ENV['BEDS24PROPKEY'];
            
            $data = array();    
            $data['authentication'] = $auth;
            
            /* Restrict the bookings using any combination of the following */
           
            $data['arrivalFrom'] =  date("Y-m-d");
            $data['arrivalTo'] = date("Y-m-d");
           // $data['status'] = '1';
    
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
         // dd($response);
        $i=0;
    
       foreach ($response as $key => $value) {
        if ($value->status == 1 || $value->status == 2 ) {
           // dd($value->guestFirstName);
            if (Reservation::where('bookId', $value->bookId )->count() == 0) {
                $attributes['guestFirstName'] = $value->guestFirstName;
                $attributes['guestName'] = $value->guestName;
                $attributes['unitId'] = $value->unitId ;
                $attributes['roomId'] = $value->roomId ;
                $attributes['firstNight'] = $value->firstNight ;
                $f_nite = new Carbon($value->firstNight);
                $attributes['lastNight'] = $value->lastNight ;
                $attributes['lastNight'] = Carbon::createFromFormat('Y-m-d', $attributes['lastNight'])->addDays(1);
                $attributes['numAdult'] = $value->numAdult ;
                $attributes['price'] = $value->price ;
                $attributes['price_uzs'] = $value->price * Reservation::exchange($value->firstNight);
                $attributes['commission'] = $value->commission ;
                $attributes['referer'] = $value->referer ;
                $attributes['bookId'] = $value->bookId;
                $diff_days = ($f_nite->diffInDays($attributes['lastNight']) );
                //  dd($diff_days * $value->numAdult);
                  $attributes['nites'] = $diff_days * $value->numAdult;
                Reservation::create($attributes);
                $i=$i+1;
            }         
            
        }
       }
           
        })->dailyAt('14:50');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    


}
