<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login( Request $request ): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->email)->where('password', md5($request->password))->first();

        if ($user) {
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
        } else {
            return response()->json(['code' => 401, 'status' => false, 'error' => 'Unauthorised'], 401);
        }
    }

    public function register( Request $request ): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'name'     => 'required|min:4',
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => md5($request->password)
        ]);

        $token = $user->createToken('authToken')->accessToken;
        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function profile(Request $request): \Illuminate\Http\JsonResponse
    {
        //
    }

}
