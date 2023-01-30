<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    public function handle( $request, Closure $next )
    {
        if (Auth::guard('admin')->user() &&
            Auth::guard('admin')->user()->status == 'Active' &&
            Auth::guard('admin')->check()) {
            return $next($request);
        } else if (Auth::guard('admin')->user() &&
            Auth::guard('admin')->user()->status == 'inActive') {
            return redirect()->route('admin.account-deactivate');
        }
        return redirect()->route('admin.login');
    }
}
