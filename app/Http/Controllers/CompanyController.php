<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $companies = Company::paginate(15);
              

   // dd($companies);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'company_name' => ['required', 'max:255'],
            'offical_company_name' => ['required','max:255'],
            'company_address_street' => ['required', 'max:255'],
            'company_address_city' => ['required', 'max:255'],
            'company_address_zip' => ['max:255'],
            'company_phone' => ['digits_between:9,12'],
            'company_email' => ['email'],
            'company_inn' => ['required', 'digits:9', 'unique:companies,company_inn'],
            'company_acc_number' => ['required', 'digits:20'],
            'company_bank_name' => ['max:125','required'],
            'company_bank_mfo' => ['digits:5','required'],

        ]);
        //dd($attributes);
             
        Company::create($attributes);
         session()->flash('success', 'New Company Created');
         session()->flash('type', 'New Company');

        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
       
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
        $attributes =  request()->validate([
            'company_name' => ['required', 'max:255'],
            'offical_company_name' => ['required','max:255'],
            'company_address_street' => ['required', 'max:255'],
            'company_address_city' => ['required', 'max:255'],
            'company_address_zip' => ['max:255'],
            'company_phone' => ['digits_between:9,12'],
            'company_email' => ['email'],
            'company_inn' => ['required', 'digits:9'],
            'company_acc_number' => ['required', 'digits:20'],
            'company_bank_name' => ['max:125','required'],
            'company_bank_mfo' => ['digits:5','required'],

        ]);
       // dd($company);
        $company->update($attributes);
        
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('companies');
    }
}
