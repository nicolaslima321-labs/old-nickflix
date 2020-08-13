<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("user")->group(function () {
    Route::post("/signup", "UserController@create");
    Route::post("/available", "UserController@userIsAvailable");
});

Route::prefix("discography")->group(function () {
    Route::post("/create", "DiscographyController@create");
    Route::get("/", "DiscographyController@getAll");
    Route::get("/{id}", "DiscographyController@get");
    Route::get("/genre/{genre}", "DiscographyController@getByGenre");
});

Route::middleware(["checkUserExistence"])->group(function () {
    Route::post("/login", "AuthController@login");
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
