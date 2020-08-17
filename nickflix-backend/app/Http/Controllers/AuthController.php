<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Hash;
use Log;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Login the user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only("email", "password");

        if(!Auth::attempt($credentials)) {
            return response()->json(["error" => "Password is incorect!"], 401);
        }

        $jwtToken = JWTAuth::fromUser(Auth::user());

        return response()->json([
            "message" => "User is authorized!",
            "authorization" => "Bearer {$jwtToken}",
        ], 200);
    }
}
