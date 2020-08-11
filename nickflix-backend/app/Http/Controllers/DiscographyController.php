<?php

namespace App\Http\Controllers;

use App\Models\Discography;
use Illuminate\Http\Request;
use Hash;
use Log;

class DiscographyController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Log::info(__CLASS__."@".__FUNCTION__.": Adding Discography..");

        $artist = $request->input('artist');
        $genre = $request->input('genre');
        $description = $request->input('description');
        $urlOrigin = $request->input('url_origin');
        $extras = $request->input('extras');

        $filePath = $request->file('picture')->storeAs(
            'discographies/pictures', $artist
        );

        $picture = $filePath;

        try {
            if (Discography::where('artist', $artist)->exists()) {
                return response()->json(["message" => "Discography cannot be created, it already exists!"], 403);
            }

            Discography::create([
                'artist' => $artist,
                'genre' => $genre,
                'description' => $description,
                'picture' => $picture,
                'url_origin' => $urlOrigin,
                'extras' => $extras,
            ]);

            return response()->json(["message" => "User successfully created!"], 200);

        } catch (\Exception $e) {
            Log::error(__CLASS__."@".__FUNCTION__.": {$e->getMessage()}\n {$e->getTraceAsString()}");
            return response()->json(["error" => "Discography creation could not be completed!"], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $discography = Discography::where('artist', $artist)->first();

        if (is_null($discography)) {
            return response(["message" => "There's no discography of this artist"], 404);
        }

        return response()->json([
            "id" => $discography->id,
            "artist" => $discography->artist,
            "genre" => $discography->genre,
            "description" => $discography->description,
            "picture" => $discography->picture,
            "url_origin" => $discography->url_origin,
            "extras" => $discography->extras,
        ], 200);
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
