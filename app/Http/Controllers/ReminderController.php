<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reminders = Http::get('https://api.cron-job.org/');
        $telegram_api = $_ENV['TELEGRAMAPI'];
        $cronjob_api = $_ENV['CRONJOBAPI'];

    $response = Http::withToken($cronjob_api)->accept('application/json')->put('https://api.cron-job.org/jobs', [
        'job' => [
            'url' => 'https://api.telegram.org/bot{$apiToken}/sendMessage?chat_id=-653810568&text=test',
        'enabled' => true,
        'title' => 'Test',
        'type' => 0,
        'schedule' => [
            'timezone' => 'Asia/Tashkent',
            'hours' => [
                '0' => 19,
            ],
            'mdays' => [
                '0' => 8,
            ],
            'minutes' => [
                '0' => 30,
            ],
            'months' => [
                '0' => 7,
            ],
            'wdays' => [
                '0' => 5,
            ],
            
        ],
        ],
      
    ]);

    //$response = Http::withToken('FcJZpmUzDEI0RLmSIdRqUPd2+SKter3vKhlZ8NoSCoQ=')->accept('application/json')->get('https://api.cron-job.org/jobs');
    dd($response);
    //dd($response->object());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
