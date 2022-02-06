<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$expenses = Expense::paginate(13);
        $expenses = DB::table('expenses')
        ->join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->join('payment_types', 'expenses.payment_type_id', '=', 'payment_types.id')
        //->select('users.*', 'contacts.phone', 'orders.price')
      
       
       // ->orderBy('reservations.firstNight', 'desc')
        ->paginate(5);
     
        // dd($expenses);
            
           return view('expenses.index', compact('expenses'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
