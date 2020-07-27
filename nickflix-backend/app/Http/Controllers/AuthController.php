<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Log;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
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

        return response()->json(["message" => "Login is authorized!"], 200);
    }
}
