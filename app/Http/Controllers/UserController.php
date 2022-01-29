<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => ['required', 'max:255'],
             'email' => ['required', 'max:255', 'email', 'unique:users'],
             'password' => ['required', 'max:255'],
             'role' => ['required', 'max:255'],
             'profile_image' => ['nullable', 'image'],
            
        ]);
      //  dd($attributes);
      $attributes['password'] = bcrypt($request->password); 
      $attributes['profile_image'] = request()->file('profile_image')->store('profile_image');
        (User::create($attributes));
        
         session()->flash('success', 'User has been created');
         session()->flash('type', 'User Creation');
         

        return redirect('users');  
        
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
        $user = User::find($id);
      //  dd($user);
        return view('users.edit')->with([
            'user' =>$user
            
        ]);
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
        $attributes =  request()->validate([
            'name' => ['required', 'max:255'],
             'email' => ['required', 'max:255', 'email',  Rule::unique('users')->ignore($id),],
             'password' => ['required', 'max:255'],
             'role' => ['required', 'max:255'],
             'profile_image' => ['image'],
            
        ]);
      // dd($attributes);
      $attributes['password'] = bcrypt($request->password); 
      if (isset($attributes['profile_image'])) {
        $attributes['profile_image'] = request()->file('profile_image')->store('profile_image');
      }
        (User::find($id)->update($attributes));
        
         session()->flash('success', 'User has been updated');
         session()->flash('type', 'User Update');
         

        return redirect('users');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
