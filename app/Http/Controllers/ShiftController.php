<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        
                     

   dd("shifts");
        return view('companies.index', compact('companies'));
    }
}
