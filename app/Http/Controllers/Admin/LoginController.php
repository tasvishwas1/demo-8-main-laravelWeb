<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function loginCheck( AdminLoginRequest $request ): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        $query = Admin::where('email', $validated['email'])->where('password', md5($validated['password']))->first();

        if ($query['status'] != 'Active') {
            return response()->json([
                'success' => false, 'message' => 'Your account is deactivated please contact to administrate',
            ]);
        }
        if ($query['status'] == 'Active') {

            $user = Admin::where('email', $validated['email'])->first();
            Auth::guard('admin')->login($user);

            return response()->json([
                'success' => true, 'message' => 'Login Success',
            ]);
        }
        if(!($query)) {
            return response()->json([
                'success' => false, 'message' => 'Email Or Password Wrong!',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect()->route('admin.auth.login');
    }

}
