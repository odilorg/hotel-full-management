<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $datas = Product::select("product_name")
        ->where("product_name","LIKE","%{$request->input('query')}%")
        ->get();
    $dataModified = array();
     foreach ($datas as $data)
     {
       $dataModified[] = $data->product_name;
     }

    return response()->json($dataModified);
    }
}
