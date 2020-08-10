<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Log;

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
        $email = $request->input("email");
        $password = $request->input("password");
        
        $user = User::where("email", $email)->first();

        if(!Hash::check($password, $user->password)) {
            return response()->json(["error" => "Password is incorect!"], 401);
        }

        return response()->json(["message" => "User is authorized!"], 200);
    }

    /**
     * Checks if email is already in use.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emailIsAvailable(Request $request)
    {
        $email = $request->input("email");
        
        if (User::where('email', $email)->exists() == false) {
            return response()->json(["message" => "Email is available!"], 200);
        }

        return response()->json(["error" => "Email not available, is already in use!"], 403);
    }
}
