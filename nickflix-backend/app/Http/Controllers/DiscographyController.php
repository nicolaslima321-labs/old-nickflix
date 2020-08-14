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
        $resume = $request->input('resume');
        $description = $request->input('description');
        $urlOrigin = $request->input('url_origin');
        $trending = is_null($request->input('trending')) ? 0 : $request->input('trending');
        $extras = json_encode($request->input('extras'));

        $artistNameFormated = str_replace(" ", "_", $artist);
        $fileExtension = $request->file('picture')->getClientOriginalExtension();
        $filePath = $request->file('picture')->storeAs(
            'public/discographies/pictures', "{$artistNameFormated}.{$fileExtension}"
        );

        $picture = $filePath;
        $pictureUrl = env("API_DISCOGRAPHY_PICTURE_URL") . "{$artistNameFormated}.{$fileExtension}";

        try {
            if (Discography::where('artist', $artist)->exists()) {
                return response()->json(["message" => "Discography cannot be created, it already exists!"], 403);
            }

            Discography::create([
                'artist' => $artist,
                'genre' => $genre,
                'resume' => $resume,
                'description' => $description,
                'picture' => $picture,
                'picture_url' => $pictureUrl,
                'url_origin' => $urlOrigin,
                'trending' => (int)$trending,
                'extras' => $extras,
            ]);

            return response()->json(["message" => "Discography successfully created!"], 200);

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
        Log::info(__CLASS__."@".__FUNCTION__.": Getting informations of Discography #{$id} ..");

        $discography = Discography::where('id', $id)->first();

        if (is_null($discography)) {
            return response(["message" => "There's no discography of this artist"], 404);
        }

        return response()->json([
            "id" => $discography->id,
            "artist" => $discography->artist,
            "genre" => $discography->genre,
            "resume" => $discography->resume,
            "description" => $discography->description,
            "picture_url" => $discography->picture_url,
            "url_origin" => $discography->url_origin,
            "extras" => $discography->extras,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByGenre()
    {
        Log::info(__CLASS__."@".__FUNCTION__.": Returning discographies by genre..");

        $rockDiscographies = Discography::where("genre", 'Rock')->get()->toArray();
        $nationalDiscographies = Discography::where("genre", 'National')->get()->toArray();
        $internationalDiscographies = Discography::where("genre", 'International')->get()->toArray();

        if (is_null($rockDiscographies) && is_null($nationalDiscographies) && is_null($internationalDiscographies)) {
            return response(["message" => "There's no discography of this artist"], 404);
        }

        return response()->json([
            "rock" => $rockDiscographies,
            "national" => $nationalDiscographies,
            "international" => $internationalDiscographies,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $discographies = Discography::all()->toArray();

        if (is_null($discographies)) {
            return response(["message" => "There's no discography"], 404);
        }

        return response()->json([
            "result" => $discographies
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTrending()
    {
        $discographies = Discography::where('trending', 1)->get()->toArray();

        if (is_null($discographies)) {
            return response(["message" => "There's no discography"], 404);
        }

        return response()->json([
            "result" => $discographies
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
