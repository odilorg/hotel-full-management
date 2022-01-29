<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
   public function loginForm() {
       return view('login');
   }

   public function login(Request $request) {
  $request->validate([
      'email' => 'required|email',
      'password' => 'required'
  ]);
  if (Auth::attempt([
      'email' => $request->email,
      'password' => $request->password,
  ])) {
    session()->flash('success', 'You logged in ');
         session()->flash('type', 'User Login');
         

        return redirect('tourgroups')->with('success', 'Welcome back');  
  }
  return redirect()->back()->withInput()->withErrors(['email' => 'Your privided cred could not be verified']);
}

public function logout() {
    Session::flush();
    Auth::logout();
    return redirect()->route('loginForm')->with('success', 'Good bye');  ;
  
}
}
