<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Report;
use App\Models\PaymentType;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $hotels = Hotel::all();
       
     
        // dd($products);
            
           return view('reports.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report_view(Request $request)
    {
        $input = $request->all();
        //get the default values from inputs
        $hotel_id = $input['hotel_id'];
        $start_date = $input['start_report_date'];
        $end_date = $input['end_report_date'];
        $report_type = $input['report_type'];
        //dd($input);
        // if report revenue id =2  - expenses report
        $hotel_name = Hotel::where('id', $hotel_id)->first();
       // dd($hotel_name->hotel_name);
        $report = array();
        $report_narast = array();
        $expense_report = array();
        $expense_total = array();
        $expense_report_narast = array();
        $from_date = $start_date;
        $to_date = $end_date;
        $categories = ExpenseCategory::get();
        $payments = PaymentType::get();
        
   
//dd($categories);
        $total_expenses = DB::table('expenses')
        ->whereBetween('expense_date', [$from_date,$to_date])
        ->where('hotel_id', $hotel_id)
        ->sum('expense_amount_uzs');
        //dd($total_expenses);
//sum of nites
        // $total_nites = DB::table('reservations')
        // ->whereBetween('firstNight', [$from_date,$to_date])
        // ->sum('nites');

//narastayushiy report

        for ($i = 0; $i < count($payments); $i++) {
            for ($t = 0; $t < count($categories); $t++) {
                $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
                ->whereBetween('expense_date', [$from_date,$to_date])
                ->where('payment_type_id', $payments[$i]->id)
                ->where('expense_category_id', $categories[$t]->id)
                ->where('hotel_id', $hotel_id)
                ->sum('expense_amount_uzs');
               
                $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
                ->whereBetween('expense_date', [$from_date,$to_date])
                ->where('payment_type_id', $payments[$i]->id)
                ->where('hotel_id', $hotel_id)
                ->sum('expense_amount_uzs');
            }
        }
       
       $exchange = Reservation::exchange(now());
    // dd($to_date);
        return view('reports.report_view' , compact('hotel_name', 'exchange', 'expense_total', 'expense_report', 'from_date', 'to_date', 'categories'));
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

            'report_date_from' => ['required', 'date'],
            'report_date_to' => ['required', 'date'],
            'report_number' => ['required'],
        ]);
        $attributes['user_id'] = Auth::user()->id;
        Report::create($attributes);
        session()->flash('success', 'Report has been added');
        session()->flash('type', 'New Report');

        return redirect('reports');
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
    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $attributes =  request()->validate([

            'report_date_from' => ['required', 'date'],
            'report_date_to' => ['required', 'date'],
            'report_number' => ['required'],
        ]);
        $report->update($attributes);
        
        return redirect('reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect('reports');
    }
}
