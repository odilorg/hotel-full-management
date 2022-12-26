<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meter;
use App\Models\Utility;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meters = Meter::paginate(15);
        return view('meters.index', compact('meters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meters = Meter::all();
        return view('meters.create', compact('meters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes =  request()->validate([
            'utility_id' => ['required', 'numeric'],
            'meter_number' => ['required', 'max:255'],
            'sertificate_expiration_date' => ['required'],
            'sertificate_image' => ['image'],
            'contract_number' => ['required', 'max:255'],
            'contract_date' => ['required']
        ]);
        if (isset($attributes['sertificate_image'])) {
            $attributes['sertificate_image'] = request()->file('sertificate_image')->store('sertificate_image');
        }
      // create cron job for telegram notification 1 month in advance of meter sertication expires
        // $telegram_api = $_ENV['TELEGRAMAPI'];
        // $cronjob_api = $_ENV['CRONJOBAPI'];
        // $sertif_date = $attributes['sertificate_expiration_date'];
        
        // $days_to_expire = Carbon::createFromFormat('Y-m-d', $sertif_date)
        //                      ->format('d');
        // $month_1_expire = Carbon::createFromFormat('Y-m-d', $sertif_date)->subDay(30)
        //                      ->format('n');
        // $year_sert = $days_to_expire = Carbon::createFromFormat('Y-m-d', $sertif_date)
        // ->format('Y');
        // $year_now = $days_to_expire = Carbon::createFromFormat('Y-m-d', now())
        // ->format('Y');
        // if (($year_sert - $year_now) > 1) {
        // }


        $utility_name = Utility::find($attributes['utility_id']);
       //dd($utility_name->utility_name);
        $utility_name = $utility_name->utility_name;

        // $message_text = $utility_name ." zavod raqami - " . $attributes['meter_number'] . " sertifikat muddati 1 oy qoldi";
        // // /dd($message_text);

        // $create_cron_job = Http::withToken($cronjob_api)->accept('application/json')->put('https://api.cron-job.org/jobs', [
        //     'job' => [
        //         'url' => 'https://api.telegram.org/bot{$apiToken}/sendMessage?chat_id=-653810568&text='.$message_text,
        //     'enabled' => true,
        //     'title' => 'Test',
        //     'type' => 0,
        //     'schedule' => [
        //         'timezone' => 'Asia/Tashkent',
        //         'hours' => [
        //             '0' => 9,
        //         ],
        //         'mdays' => [
        //             '0' => $days_to_expire,
        //         ],
        //         'minutes' => [
        //             '0' => 0,
        //         ],
        //         'months' => [
        //             '0' => $month_1_expire,
        //         ],
        //         'wdays' => [
        //             '0' => -1,
        //         ],
                
        //         ],
        //     ],
          
        // ]);
             
        Meter::create($attributes);
         session()->flash('success', 'New Meter Created');
         session()->flash('type', 'New Meter');

        return redirect('meters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meter $meter)
    {
        $utilities = Utility::all();
      //  dd($utilities) ;
        return view('meters.edit', compact('meter', 'utilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meter $meter)
    {
        $attributes =  request()->validate([
            'utility_id' => ['required', 'numeric'],
            'meter_number' => ['required', 'max:255'],
            'sertificate_expiration_date' => ['required'],
            'sertificate_image' => ['image'],
            'contract_number' => ['required', 'max:255'],
            'contract_date' => ['required']
        ]);
        if (isset($attributes['sertificate_image'])) {
            $attributes['sertificate_image'] = request()->file('sertificate_image')->store('sertificate_image');
        }
        //dd($attributes);
             
        $meter->update($attributes);
     
         session()->flash('success', 'Meter Updated');
         session()->flash('type', 'Meter Update');

        return redirect('meters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meter $meter)
    {
        $meter->delete();
        session()->flash('success', 'Meter Deleted');
        session()->flash('type', 'Delete Meter');
        return redirect('meters');
    }
}
