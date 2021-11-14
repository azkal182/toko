<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function handleLogin(Request $req)
    {
        if(\Auth::guard('admin')
            ->attempt($req->only(['username', 'password'])))
        {
            return redirect()
                ->route('admin.home');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        if (\Auth::guard('admin')->check()) {
            \Auth::guard('admin')->logout();
            return redirect()
                ->route('admin.login');
        } elseif (Auth::guard('web')->check()) {
            \Auth::guard('web')->logout();
            return redirect()
                ->route('login');
        }
//        \Auth::guard('admin')
//            ->logout();


    }
}
