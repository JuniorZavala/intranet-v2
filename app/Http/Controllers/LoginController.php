<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
  public function showLogin(Request $request)
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request)
  {

    $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    if (Auth::attempt(['email'=> $request->email,'password'=> $request->password])) {

      $request->session()->regenerate();
      $user = $this->getUser();

      return Redirect::route('dashboard');
    }

  }

  private function getUser(){
    return Auth::user();
  }
}
