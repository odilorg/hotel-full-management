<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Expense;
use App\Models\PaymentType;
use Illuminate\Http\Request;

use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function expense_hotels($hotel_id)
    {
        $expenses = DB::table('expenses')
        ->where('hotel_id', $hotel_id)
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->join('payment_types', 'expenses.payment_type_id', '=', 'payment_types.id')
        ->select('expenses.*', 'payment_types.payment_type_name', 'expense_categories.category_name')
        ->orderBy('expenses.expense_date', 'desc')
        ->paginate(25);
        $hotels = Hotel::all();
        

        $unique_report_number = $expenses->unique('report_number')->whereNotNull('report_number');
      
            return view('expenses.index', compact('hotels', 'expenses', 'unique_report_number'));
    }


    public function index()
    {
        $expenses = DB::table('expenses')
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->join('payment_types', 'expenses.payment_type_id', '=', 'payment_types.id')
        ->select('expenses.*', 'payment_types.payment_type_name', 'expense_categories.category_name')
        ->orderBy('expenses.expense_date', 'desc')
        ->paginate(25);
        $hotels = Hotel::all();
        

        $unique_report_number = $expenses->unique('report_number')->whereNotNull('report_number');
      
            return view('expenses.index', compact('hotels', 'expenses', 'unique_report_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $reports = DB::table('reservations')->select('report_number')->whereNotNull('report_number')->distinct()->get();
        $expenses = ExpenseCategory::get();
        $payments = PaymentType::get();
        return view('expenses.create', compact('reports', 'expenses', 'payments'));
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

            'report_number' => ['required '],
            'expense_name' => ['required ', 'max:255'],
            'expense_date' => ['required'],
            'expense_category_id' => ['required'],
            'payment_type_id' => ['required'],
            'expense_amount_uzs' => ['required', 'numeric'],
            'expense_number' => ['max:255'],
            
         
        ]);
        $attributes['user_id'] = auth()->user()->id;
       //dd($attributes);
        Expense::create($attributes);
        session()->flash('success', 'Expense has been added');
        session()->flash('type', 'New Expense');

        return redirect('expenses');
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
    public function edit(Expense $expense)
    {
      
        

        $report_numbers = DB::table('reservations')->select('report_number')->whereNotNull('report_number')->distinct()->get();
        $expense_categories = ExpenseCategory::get();
        $payment_types = PaymentType::get();
        //dd($report_numbers);
        $expenses = DB::table('expenses')
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->join('payment_types', 'expenses.payment_type_id', '=', 'payment_types.id')
        ->where('expenses.id', $expense->id)
        ->select('expenses.*', 'payment_types.payment_type_name', 'expense_categories.category_name')
        ->first();
       //dd($expenses);
        return view('expenses.edit', compact('expenses', 'report_numbers', 'expense_categories', 'payment_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
      

        $attributes =  request()->validate([

            'report_number' => ['required '],
            'expense_name' => ['required ', 'max:255'],
            'expense_date' => ['required'],
            'expense_category_id' => ['required'],
            'payment_type_id' => ['required'],
            'expense_amount_uzs' => ['required', 'numeric'],
            'expense_number' => ['max:255'],
            
         
        ]);
      //  dd($attributes);
        $expense->update($attributes);
        session()->flash('success', 'Expense has been updated');
        session()->flash('type', 'Expense Update');
        return redirect('expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
       
        $expense->delete();
        session()->flash('error', 'Expense has been deleted');
        session()->flash('type', 'Expense Delete');
        return redirect('expenses');
    }


    public function report_range(Request $request)
    {
       
        $report = array();
        $arrival_from = $request->input('from_date');
        $arrival_to = $request->input('to_date');
        $categories = ExpenseCategory::get();
        $payments = PaymentType::get();
       

        $total_expenses = DB::table('expenses')
        ->whereBetween('expense_date', [$arrival_from, $arrival_to])
        ->sum('expense_amount_uzs');

        for ($i = 0; $i < count($payments); $i++) {
            for ($t = 0; $t < count($categories); $t++) {
                $expense_report[ $payments[$i]->payment_type_name ][ $categories[$t]->category_name ] = DB::table('expenses')
                    ->whereBetween('expense_date', [$arrival_from, $arrival_to])
                    ->where('payment_type_id', $payments[$i]->id)
                    ->where('expense_category_id', $categories[$t]->id)
                    ->sum('expense_amount_uzs');

                $report[ $payments[$i]->payment_type_name ] = DB::table('reservations')
                    ->whereBetween('expense_date', [$arrival_from, $arrival_to])
                    ->where('payment_method', $payments[$i]->payment_type_name)
                    ->sum('price');

                $expense_total[ $payments[$i]->payment_type_name ] = DB::table('expenses')
                    ->whereBetween('expense_date', [$arrival_from, $arrival_to])
                    ->where('payment_type_id', $payments[$i]->id)
                    ->sum('expense_amount_uzs');
            }
        }
        $total_report = DB::table('reservations')
                            ->where('report_number', $report_number)
                            ->sum('price');
        
        $report['total_booking_comission'] = DB::table('reservations')
                            ->where('report_number', $report_number)
                            ->where('referer', 'Booking.com')
                            ->sum('commission');
        $exchange = Reservation::exchange(now());

                            
      //dd($exchange);

        return view('reservations.report', compact('report', 'expense_report', 'report_number', 'total_report', 'total_expenses', 'expense_total', 'exchange'));
    }
}
