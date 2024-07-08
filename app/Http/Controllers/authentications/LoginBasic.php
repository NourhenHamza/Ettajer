<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginBasic extends Controller

{
  use AuthenticatesUsers;

  protected $redirectTo = 'dashboard-analytics';
  public function index()
  {
    return view('auth.login');
  }
  public function authenticate(Request $request)
    {
        // Validate the user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Set the credentials for authentication
        $credentials = $request->only('email', 'password');

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard-analytics');
        }

        // Authentication failed...
        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
}
