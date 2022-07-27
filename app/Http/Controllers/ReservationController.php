<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\PaymentType;
use Exception;
use App\Models\Room;
use App\Models\Report;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $rooms = DB::table('rooms')

        ->join("reservations",function($join){
            $join->on("reservations.roomId","=","rooms.room_id")
                ->on("reservations.unitId","=","rooms.unit_id");

        })
       
        ->orderBy('reservations.firstNight', 'desc')
        ->paginate(25);

        // $collection = $rooms->unique(function ($name) {
        //     return $name;
        // })->reject(function ($name) {
        //     return empty($name);
        // });


        $unique_report_number = $rooms->unique('report_number')->whereNotNull('report_number');

        // dd($unique_report_number);
        // $reports = DB::table('reservations')
           
        // ->join('reports', 'report_id', '=', 'reports.id')
        //     ->get();
           
            // $merged = $rooms->merge($reports);

            
            // dd($rooms);
            // dd($reports);
    // $reservations = Reservation::get();
    //  dd($rooms);
    //  $w[] = array_merge($rooms, $reservations );
    //  dd($w);
     return view('reservations.index', compact('rooms', 'unique_report_number'));
    }
    public function beds24()
    {
        $attributes2 =  request()->validate([

            'from_date' => ['required '],
            'to_date' => ['required'],
          ]);
          $attributes2['from_date'] =  str_replace('-', '', $attributes2['from_date']);
          $attributes2['to_date'] =  str_replace('-', '', $attributes2['to_date']);
          
        
        $auth = array();
        $auth['apiKey'] = $_ENV['BEDS24API'];
        $auth['propKey'] = $_ENV['BEDS24PROPKEY'];
        
        $data = array();    
        $data['authentication'] = $auth;
        
        /* Restrict the bookings using any combination of the following */
       
        $data['arrivalFrom'] =  $attributes2['from_date'];
        $data['arrivalTo'] = $attributes2['to_date'];
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
          //  dd($attributes['lastNight']);
            $diff_days = ($f_nite->diffInDays($attributes['lastNight']) );
          //  dd($diff_days * $value->numAdult);
            $attributes['nites'] = $diff_days * $value->numAdult;
            Reservation::create($attributes);
            $i=$i+1;
        }         
        
    }
   }
      
 //  dd($attributes);
   
//    foreach ($response as $key => $value) {
//             if (Reservation::where('bookId', $value->bookId )->count() > 0) {
//                 dd('exists');
//                 session()->flash('error', 'This reservation exists');
//                 return redirect('reservations');
//             } else {
//                 if ($value->status == 1 || $value->status == 2 ) {
//                     $attributes['guestFirstName'] = $value->guestFirstName;
//                     $attributes['guestName'] = $value->guestName;
//                     $attributes['unitId'] = $value->unitId ;
//                     $attributes['roomId'] = $value->roomId ;
//                     $attributes['firstNight'] = $value->firstNight ;
//                     $attributes['lastNight'] = $value->lastNight ;
//                     $attributes['numAdult'] = $value->numAdult ;
//                     $attributes['price'] = $value->price ;
//                     $attributes['price_uzs'] = $value->price * Reservation::exchange($value->firstNight);
//                     $attributes['commission'] = $value->commission ;
//                     $attributes['referer'] = $value->referer ;
//                     $attributes['bookId'] = $value->bookId;
//                      }
               
//             }
            
           
//          // dd(Reservation::where('bookId', $value->bookId )->count() == 0);
        
//            Reservation::create($attributes);
//         }
        session()->flash('success', $i. ' records were created');
        session()->flash('type', 'Beds24');

       return redirect('reservations'); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $attributes =  request()->validate([

            'guestFirstName' => ['required ', 'max:255'],
            'guestName' => ['max:255'],
            'bookId' => ['required'],
            'roomId' => ['required'],
            'firstNight' => ['required' ],
            'lastNight' => ['required' ],
            'numAdult' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
            'referer' => ['required' ],
            'payment_method' => ['max:255' ],
            'company_name' => ['max:255' ],
            'ok_ytt' => ['required', 'max:255' ],
            'company_id' => ['max:255' ],
        ]);
        
        $attributes['price_uzs'] = $attributes['price'] * Reservation::exchange($attributes['firstNight'] );
        Reservation::create($attributes);
        session()->flash('success', 'Booking created');
        session()->flash('type', 'New Booking');

       return redirect('reservations'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
     //  
      
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $attributes =  request()->validate([

          
            'payment_method' => ['required', 'max:255' ],
            'company_name' => ['max:255' ],
            'price' => ['required', 'numeric'],
            'report_number' => ['required'],
            'ok_ytt' => ['max:255'],
        ]);
        $company_id = Company::where('company_name', $attributes['company_name'])
        ->first();
        //inserting todays date as report_number
      //  $attributes['report_number']  = Carbon::createFromFormat('Y-m-d', now());  
           //dd($company_id);
            if ($company_id) {
                $attributes['company_id'] =   $company_id->id;
            }
          
        //dd($request->ok_ytt);
        $attributes['price_uzs'] = $attributes['price'] * Reservation::exchange($reservation->firstNight);
        $reservation->update($attributes);
        session()->flash('success', 'Booking updated');
        session()->flash('type', 'Booking');
 
        
        return redirect('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        session()->flash('error', 'Booking Deleted');
        session()->flash('type', 'Booking Deleted');

        return redirect('reservations');
    }

public function report(Request $request) {
       
        $report = array();
        $report_narast = array();
        $expense_report = array();
        $expense_report_narast = array();
        $first_night = $request->input('firstNight');

        $categories = ExpenseCategory::get();
        $payments = PaymentType::get();
        $res_quan = Reservation::get();
       
       
//dd($categories);
$total_expenses = DB::table('expenses')
    ->where('expense_date',$first_night)
    ->sum('expense_amount_uzs');
//daily first night report
for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->where('expense_date',$first_night)
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
            ->where('firstNight',$first_night)
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
        ->where('expense_date',$first_night)
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}
//dd($expense_report);
//narastayushiy report 

for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report_narast[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->whereBetween('expense_date',["2022-01-01",$first_night])
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report_narast[ $payments[$i]->payment_type_name ] = DB::table('reservations')
            ->whereBetween('firstNight',["2022-01-01",$first_night])
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total_narast[ $payments[$i]->payment_type_name ] = DB::table('expenses')
        ->whereBetween('expense_date',["2022-01-01",$first_night])
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}

 $total_report = DB::table('reservations')
                            ->where('firstNight',$first_night)
                            ->sum('price');
        
        $report['total_booking_comission'] = DB::table('reservations')
                            ->where('firstNight',$first_night)  
                            ->where('referer','Booking.com')
                            ->sum('commission');  
        $exchange = Reservation::exchange(now());
//for the narastayushiy date       
$total_report_narast = DB::table('reservations')
    ->whereBetween('firstNight',["2022-01-01",$first_night])
    ->sum('price');

$report_booking_narast['total_booking_comission'] = DB::table('reservations')
    ->whereBetween('firstNight',["2022-01-01",$first_night])
    ->where('referer','Booking.com')
    ->sum('commission');  
$exchange = Reservation::exchange(now());

                            
    //  dd($total_report);

return view('reservations.report', compact('report_booking_narast', 'total_report_narast', 'expense_total_narast', 'report_narast', 'expense_report_narast', 'categories', 'report', 'expense_report', 'first_night', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    
}

public function report_range(Request $request) {
       
    $report = array();
    $report_narast = array();
    $expense_report = array();
    $expense_report_narast = array();
    $from_date = $request->input('from_date');
    $to_date = $request->input('to_date');
    $categories = ExpenseCategory::get();
    $payments = PaymentType::get();
    $res_quan = Reservation::get();
   
//dd($categories);
$total_expenses = DB::table('expenses')
->whereBetween('expense_date',[$from_date,$to_date])
->sum('expense_amount_uzs');
//sum of nites
$total_nites = DB::table('reservations')
->whereBetween('firstNight',[$from_date,$to_date])
->sum('nites');

//narastayushiy report 

for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->whereBetween('expense_date',[$from_date,$to_date])
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
            ->whereBetween('firstNight',[$from_date,$to_date])
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
            ->whereBetween('expense_date',[$from_date,$to_date])
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}

 $total_report = DB::table('reservations')
                            ->whereBetween('firstNight',[$from_date,$to_date])
                            ->sum('price');
$total_unpaid = DB::table('reservations')
                            ->whereBetween('firstNight',[$from_date,$to_date])
                            ->where('payment_method', null)
                            ->sum('price');       
 
        
        $report['total_booking_comission'] = DB::table('reservations')
                            ->whereBetween('firstNight',[$from_date,$to_date])
                            ->where('referer','Booking.com')
                            ->sum('commission');  
        $exchange = Reservation::exchange(now());

return view('reservations.report-range', compact('total_nites', 'total_unpaid', 'categories', 'report', 'expense_report', 'to_date', 'from_date', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    
}
   
public function report_range_unpaid( $sana1, $sana2) {
    // $total_unpaid = DB::table('reservations')
    //     ->whereBetween('firstNight',[$sana1, $sana2])
    //     ->where('payment_method', null)
    //     ->get();  

    $total_unpaid = DB::table('rooms')

    ->join("reservations",function($join) use ($sana1, $sana2){
        $join->on("reservations.roomId","=","rooms.room_id")
            ->on("reservations.unitId","=","rooms.unit_id")
            ->whereBetween('reservations.firstNight',[$sana1, $sana2])
            ->where('reservations.payment_method', null);

    })
   
    
    ->paginate(25);

    $total_unpaid_sum = DB::table('reservations')
    ->whereBetween('firstNight',[$sana1,$sana2])
    ->where('payment_method', null)
    ->sum('price');      




        return view('reservations.report-range-unpaid', compact('total_unpaid_sum', 'total_unpaid', 'sana1', 'sana2'));
    



}



public function unpaid(Request $request) {


    // $nites = Reservation::all();
    // $i=0;
    // //dd($nites);
    // foreach ($nites as $nite) {
    //    // dd( $nite->numAdult);
    //    if($nite->firstNight < '2022-05-06') {
    //    // $f_nite = new Carbon($nite->firstNight); 
    //     $l_nite = new Carbon($nite->lastNight);
    //     $l_nite = $l_nite->addDays(1);
    //     //$diff_days = ($f_nite->diffInDays($l_nite) );
    //    // $nite = new Reservation ;
    //     $nite->lastNight =  $l_nite;
        
    //     $nite->save();
    //    }
       
    //    // dd('done');
    //     $i=$i+1;
        
    // //   /  $nite->nites = 
    // }



    // dd($i);


    $unpaid_date = $request->input('unpaid');

    $unpaid_reservations = DB::table('rooms')
    ->join("reservations",function($join) use ($unpaid_date){
        
        
        $join->on("reservations.roomId","=","rooms.room_id")
             ->on("reservations.unitId","=","rooms.unit_id")
             ->where('reservations.lastNight', $unpaid_date)
             ->where('reservations.payment_method', null)
             ;
    })
  
    ->orderBy('reservations.firstNight', 'desc')
    ->paginate(25);
    
    //$unpaid_reservations = Reservation::where('lastNight', $unpaid_date)->where('payment_method', null)->get();
//dd($unpaid_reservations);
    
    return view('reservations.unpaid', compact('unpaid_date', 'unpaid_reservations'));    
    
    //dd($unpaid_reservations);
}


public function closeday(Request $request) {
       
    $report_date = $request->input('report_number');
    $report = array();
    $report_narast = array();
    $expense_report = array();
    $expense_report_narast = array();
    $from_date = $request->input('from_date');
    $to_date = $request->input('to_date');
    $categories = ExpenseCategory::get();
    $payments = PaymentType::get();
    $res_quan = Reservation::get();
   
//dd($categories);
$total_expenses = DB::table('expenses')
->where('report_number', $report_date)
->sum('expense_amount_uzs');
//narastayushiy report 

for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->where('report_number', $report_date)
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
            ->where('report_number', $report_date)
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
            ->where('report_number', $report_date)
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}

 $total_report = DB::table('reservations')
                            ->where('report_number', $report_date)
                            ->sum('price');
$total_unpaid = DB::table('reservations')
                            ->where('report_number', $report_date)
                            ->where('payment_method', null)
                            ->sum('price');       
 
        
        $report['total_booking_comission'] = DB::table('reservations')
                            ->where('report_number', $report_date)
                            ->where('referer','Booking.com')
                            ->sum('commission');  
        $exchange = Reservation::exchange(now());

return view('reservations.closeday', compact('report_date', 'total_unpaid', 'categories', 'report', 'expense_report', 'to_date', 'from_date', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    
}



    
}
