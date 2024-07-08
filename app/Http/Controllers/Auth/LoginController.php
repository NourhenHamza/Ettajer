<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();


            if ($user->role) {

                if ($user->role->name === 'admin') {
                    // Redirect the user to the admin dashboard
                    return redirect()->route('dashboard-analytics');
                } else {
                    // The user does not have the admin role
                    Auth::logout();
                    session()->flash('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
                    return redirect()->route('login');
                }
            } else {
                // The user does not have any role
                Auth::logout();
                session()->flash('error', 'Votre compte n\'a pas de rôle assigné.');
                return redirect()->route('login');
            }
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid email or password.');
            return redirect()->route('login');
        }
    }
}
