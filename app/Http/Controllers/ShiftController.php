<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Shift;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Room;
use App\Models\ShiftPayment;
use Illuminate\Support\Facades\Auth;

class ShiftController extends Controller
{
    
  public function shift_expenses_create() {
    $payments = PaymentType::get();
    $expense_categories = ExpenseCategory::get();
    //$shift = Shift::where('user_id', Auth::id())->first();
    return view('shifts.shift_expenses_create', compact('payments', 'expense_categories') );
    
  }
  public function shift_expenses_store() {
    $attributes =  request()->validate([

      'expense_name' => ['max:255' ],
      'expense_amount_uzs' => ['required', 'numeric'],
      
      'payment_type_id' => ['required', 'numeric'],
      'expense_category_id' => ['required', 'numeric'],

  ]);
  $shift = Shift::where('user_id', auth()->user()->id)->first();
  $attributes['expense_date'] = $shift->created_at;
  $attributes['user_id'] = $shift->user_id;
  $attributes['hotel_id'] = $shift->hotel_id;
  $attributes['shift_id'] = $shift->id;
 // dd($attributes);
 Expense::create($attributes);
 session()->flash('success', 'Expense has been added');
 session()->flash('type', 'New Expense');
 
 return redirect()->route('shifts.index');
  }
  public function index()
    {
      $shift_payments  ="";
      $shift_expenses="";
      $payments ="";
        $rooms ="";
        $hotels = Hotel::all();  
         $id = Auth::id();   
         $shift = Shift::where('user_id', $id)->first();
       
       //  dd($shift_payments);
         if ($shift) {
            $payments = PaymentType::get();
            $rooms = Room::where('hotel_id', $shift->hotel_id)->orderBy('room_number', 'asc')->get();
            $shift_payments = ShiftPayment::where('shift_id', $shift->id)->with( ['room', 'payment_type'])->get();
            $shift_expenses = Expense::where('shift_id', $shift->id)->with( ['payment_type', 'expense_category'])->get();
         }
        
    //    /dd($rooms);
         return view('shifts.index', compact('shift_payments', 'rooms', 'payments', 'shift', 'hotels' , 'shift_expenses'));
   
   
//          if ($shift) {
//     dd('shift exist');
//     return view('shifts.index', compact('shift', 'hotels'));
//    } else {
//     return view('shifts.index', compact('hotels'));
//    }
   
   
             
     

//dd($shift);
       
    }

    public function create()
    {
        
        return view('shifts.create');
    }
    public function show()
    {
        
        dd('show shift');
    }

    public function start(Request $request)
    {
       $id = Auth::id();
     //dd($id);
       $shift = Shift::where('user_id', $id)->first();
       //check if shift opne or closed
       //dd($shift);
       if ($shift and $shift->status == '1' ) {
        dd('shift is not closed');
         
       } else {
       //  dd($request->input('hotel_id'));
        $attributes =  request()->validate([
            'hotel_id' => ['required', 'numeric'],
            'saldo_start' => ['required', 'numeric'],
           
            

        ]);


      // dd($attributes);
       $attributes['status'] = '1';
        $attributes['user_id'] = auth()->user()->id;     
        // dd($attributes);
        // dd($request->input('hotel_id'));
        // $attributes['user_id'] = request('')
        Shift::create($attributes);
         session()->flash('success', 'New Shift Created');
         session()->flash('type', 'New Shift');
//dd('shift created');
        return redirect('shifts');
       }
       
       
     
       
       
       
    }
}
