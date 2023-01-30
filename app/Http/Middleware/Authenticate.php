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

        if(\Request::is('admin/*')) {
            return route('admin.login');
        } else if(\REquest::is('vendor/*')) {
            return route('vendor.login');
        } else {
            return route('login');
        }

//        if (! $request->expectsJson()) {
//            return route('login');
//        }

    }
}
