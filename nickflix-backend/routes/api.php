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

Route::middleware(["jwt.auth"])->group(function () {
    Route::prefix("discography")->group(function () {
        Route::post("/create", "DiscographyController@create");
        Route::get("/", "DiscographyController@getAll");
        Route::get("/id/{id}", "DiscographyController@get");
        Route::get("/genre", "DiscographyController@getByGenre");
        Route::get("/trending", "DiscographyController@getTrending");
    });
});

Route::middleware(["checkUserExistence"])->group(function () {
    Route::prefix("auth")->group(function () {
        Route::post("/login", "AuthController@login");
    });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
