<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use App\Models\Inkassa;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InkassaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inkassas = DB::table('inkassas')
        ->join('firmas', 'inkassas.firm_id', '=', 'firmas.id')
        ->select('inkassas.*', 'firmas.firm_name')
        ->orderBy('created_at', 'desc')
        ->paginate(15);
    $firmas = Firma::get();    
        for ($i=0; $i < count($firmas); $i++) {
            $total_ytt[$i] = DB::table('inkassas')
                ->where('firm_id', $firmas[$i]->id)
                ->sum('amount_inkassa');
        }
    //dd($total_ytt);

        return view('inkassas.index', compact('inkassas', 'total_ytt', 'firmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firmas = Firma::get();
        $reports = DB::table('reservations')
        ->select('report_number')
        ->distinct()
        ->whereNotNull('report_number')
        ->get();
        return view('inkassas.create', compact('firmas', 'reports'));
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

            'date_inkassa' => ['required '],
            'amount_inkassa' => ['required ', 'numeric'],
            'report_id' => ['required'],
            'firm_id' => ['required'],
        ]);
        $attributes['user_id'] = auth()->user()->id; 
         // dd($attributes['total_amount']);
        Inkassa::create($attributes);
        session()->flash('success', 'Inkassa created');
        session()->flash('type', 'New Inkassa');

       return redirect('inkassas');


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
    public function edit(Inkassa $inkassa)
    {
        $report_numbers = DB::table('reservations')->select('report_number')->whereNotNull('report_number')->distinct()->get(); 
        $firm_names = Firma::get();
        return view('inkassas.edit', compact('report_numbers', 'inkassa', 'firm_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inkassa $inkassa)
    {
        $attributes =  request()->validate([

            'date_inkassa' => ['required '],
            'amount_inkassa' => ['required ', 'numeric'],
            'report_id' => ['required'],
            'firm_id' => ['required'],
        ]);
        session()->flash('success', 'Inkassa updated');
        session()->flash('type', 'Inkassa Update');

        $inkassa->update($attributes);
        
        return redirect('inkassas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inkassa $inkassa)
    {
        $inkassa->delete();
        return redirect('inkassas');
    }
}
