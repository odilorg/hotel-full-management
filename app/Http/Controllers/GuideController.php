<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Tourgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Guid\Guid;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = auth()->user()->id;

        $guides = Guide::with(['tourgroup'])
       ->whereHas('tourgroup', function($q) use($value) {
       $q->where('user_id', '=', $value); 
        })
        ->paginate(13);
    //    / dd($guides);
        return view('guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
        return view('guides.create', compact('tourgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Guide $guide, Tourgroup $tourgroup)
    {
        
        
        $attributes =  request()->validate([
            'guide_name' => ['required', 'max:255'],
            'guide_phone' => ['required','digits:5', 'max:25'],
            'guide_lang' => ['required', 'max:255'],
            'guide_status' => ['required', 'max:255'],
            'guide_extra_info' => ['max:255'],
            'tourgroup_id' => ['max:255','numeric'],
        ]);
        //dd($attributes);
             
        Guide::create($attributes);
         session()->flash('success', 'Guide has been assigned');
         session()->flash('type', 'New Guide');

        return redirect('guides');    
        




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
    public function edit(Guide $guide)
    {
        $tourgroup_name = $guide->tourgroup->tourgroup_name;
    //   $hotelres = $hotelreservation;
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('guides.edit', compact('guide', 'tourgroups', 'tourgroup_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
         
        $attributes =  request()->validate([
            'guide_name' => ['required', 'max:255'],
            'guide_phone' => ['required','digits:5', 'max:25'],
            'guide_lang' => ['required', 'max:255'],
            'guide_status' => ['required', 'max:255'],
            'guide_extra_info' => ['max:255'],
            'tourgroup_id' => ['max:255','numeric'],
        ]);
        $guide->update($attributes);
        
        return redirect('guides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect('guides');
    }
}
