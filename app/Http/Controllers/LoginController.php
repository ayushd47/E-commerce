<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function login(Request $request)
    {

        // dd($request->all());

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password

        ])) {
            $user =  User::where('email', $request->email)->first();
            if ($user->is_admin()) {
                return redirect()->route('dashboard');
            }
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('welcome');
        }
        return redirect()->back();
    }
}
