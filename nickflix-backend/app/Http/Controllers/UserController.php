<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Log;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Log::info(__CLASS__."@".__FUNCTION__.": Creating User..");

        $name = $request->input("name");
        $lastName = $request->input("last_name");
        $email = $request->input("email");
        $password = $request->input("password");
        $musicStyle = $request->input("music_genre");
        $birthday = $request->input("birthday");

        try {
            if (User::where('email', $email)->exists()) {
                return response()->json(["message" => "User cannot be created, this email is already exists!"], 403);
            }

            User::create([
                "name" => $name,
                "last_name" => $lastName,
                "email" => $email,
                "password" => Hash::make($password),
                "music_genre" => $musicStyle,
                "birthday" => $birthday,
            ]);

            return response()->json(["message" => "User successfully created!"], 200);

        } catch (\Exception $e) {
            Log::error(__CLASS__."@".__FUNCTION__.": {$e->getMessage()}\n {$e->getTraceAsString()}");
            return response()->json(["error" => "User creation could not be completed!"], 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
