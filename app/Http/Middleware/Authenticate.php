<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }

        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                if (\Auth::guard('admin')->check()) {

                    return redirect('/admin');

                }
                return route('admin.login');
            }

            return route('login');
        }
//        if (\Auth::guard('admin')->check()) {
//
//            return redirect('/admin');
//
//        } else if (\Auth::guard('web')->check()) {
//
//            return redirect('/home');
//
//        }
    }
}
