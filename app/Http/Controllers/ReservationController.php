<?php

namespace App\Http\Controllers;

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
        $auth['apiKey'] = 'klfsdjkfkksdj234234';
        $auth['propKey'] = 'hfgtryrt43534sadfsdf';
        
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
            $attributes['lastNight'] = $value->lastNight ;
            $attributes['numAdult'] = $value->numAdult ;
            $attributes['price'] = $value->price ;
            $attributes['price_uzs'] = $value->price * Reservation::exchange($value->firstNight);
            $attributes['commission'] = $value->commission ;
            $attributes['referer'] = $value->referer ;
            $attributes['bookId'] = $value->bookId;
            Reservation::create($attributes);
            $i=$i+1;
        }         
        
    }
   }
        
   
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
            'report_number' => ['max:255'],
        ]);
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
        $report_number = $request->input('report_number');

        $categories = ExpenseCategory::get();
        $payments = PaymentType::get();
        $res_quan = Reservation::get();
       
       
//dd($categories);
$total_expenses = DB::table('expenses')
    ->where('report_number',$report_number)
    ->sum('expense_amount_uzs');

for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->where('report_number',$report_number)
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
            ->where('report_number',$report_number)
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
            ->where('report_number',$report_number)
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}
//dd($expense_report);

//create array with all reports
$reports_array = array();
$reports_all_distinct = array();
$new_array = array();

$reports_all_distinct = DB::table('reservations')->distinct()->whereNotNull('report_number')->pluck('report_number');
$reports_all = DB::table('reservations')->pluck('report_number');
dd($reports_all_distinct);

for ($i = 0; $i < count($reports_all); $i++){
    for ($t = 0; $t < count($reports_all_distinct); $t++){
        if ($reports_all[$i] === $reports_all_distinct[$t]  ) {
            Reservation::where('report_number', $reports_all[$i])
            ->update(['report_number' => $i]);
            // DB::table('reservations')->insert(['report_number' => $reports_all[$i] ]);
           // $new_array[$i] = $reports_all[$i];
            break;
        }
    }    
}


// dd($new_array);

//narastayushiy itog
for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
            ->whereBetween('report_number',[1,$report_number])
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
        ->whereBetween('report_number',[1,$report_number])
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
        ->whereBetween('report_number',[1,$report_number])
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
 }
 dd($expense_report);
        $total_report = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->sum('price');
        
        $report['total_booking_comission'] = DB::table('reservations')
                            ->where('report_number',$report_number)
                            ->where('referer','Booking.com')
                            ->sum('commission');  
        $exchange = Reservation::exchange(now());

                            
      //dd($exchange);

return view('reservations.report', compact('categories', 'report', 'expense_report', 'report_number', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    
}

    public function report_range(Request $request) {
        $report = array();
        $report_number = $request->input('report_number');
        $arrival_from = $request->input('from_date');
        $arrival_to = $request->input('to_date');
        $expense_report = array();
        $categories = ExpenseCategory::get();
        $payments = PaymentType::get();


//Query
$total_expenses = DB::table('expenses')
    ->whereBetween('expense_date', [$arrival_from, $arrival_to])
    ->sum('expense_amount_uzs');


   // dd($total_expenses);
    //Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->sum('price');  

for ($i = 0; $i < count($payments); $i++){
    for ($t = 0; $t < count($categories); $t++) {
        $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
           ->whereBetween('expense_date', [$arrival_from, $arrival_to])
            ->where('payment_type_id', $payments[$i]->id)
            ->where('expense_category_id', $categories[$t]->id)
            ->sum('expense_amount_uzs');

        $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
           ->whereBetween('firstNight', [$arrival_from, $arrival_to])
            ->where('payment_method', $payments[$i]->payment_type_name )
            ->sum('price');

        $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
           ->whereBetween('expense_date', [$arrival_from, $arrival_to])
            ->where('payment_type_id', $payments[$i]->id)
            ->sum('expense_amount_uzs');
    }
   
}
        $total_report = DB::table('reservations')
                           ->whereBetween('firstNight', [$arrival_from, $arrival_to])
                            ->sum('price');
        
        $report['total_booking_comission'] = DB::table('reservations')
                           ->whereBetween('firstNight', [$arrival_from, $arrival_to])
                            ->where('referer','Booking.com')
                            ->sum('commission');  
        $exchange = Reservation::exchange(now());






// $report['total_report'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->sum('price');  
    
// $report['total_naqd'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->where('payment_method','Naqd')    
//     ->sum('price');  
    
// $report['total_karta'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->where('payment_method','Karta')    
//     ->sum('price'); 
// $report['total_perech'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->where('payment_method','Perech')    
//     ->sum('price'); 

// $report['total_booking_comission'] = Reservation::whereBetween('firstNight', [$arrival_from, $arrival_to])
//     ->where('referer','Booking.com')   
//     ->sum('commission');
    
    return view('reservations.report-range', compact('categories', 'report', 'report_number', 'expense_report', 'arrival_from', 'arrival_to', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    

    //dd($report['total_naqd']);

    }
   


    
}
