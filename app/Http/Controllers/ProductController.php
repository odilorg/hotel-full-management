<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('product_name', 'asc')->paginate(13);
       
     
   // dd($products);
       
      return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        return view('products.create');
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

            'product_name' => ['required ', 'max:255'],
            'product_weight' => ['numeric'],
            'product_price' => ['numeric'],
            'product_description' => ['max:255'],
         
        ]);
        $attributes['user_id'] = auth()->user()->id;
        Product::create($attributes);
        session()->flash('success', 'Maxsulot yaratildi');
        session()->flash('type', 'Yangi Maxsulot');

       return redirect('products'); 
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
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $attributes =  request()->validate([

            'product_name' => ['required ', 'max:255'],
            'product_weight' => ['numeric'],
            'product_price' => ['numeric'],
            'product_description' => ['max:255'],
         
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $product->update($attributes);
        session()->flash('success', 'Maxsulot ozgartrildi');
        session()->flash('type', 'Maxsulot');
 
        
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products');
    }
}
