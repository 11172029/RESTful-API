<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::all();
        // return MovieResource::collection($data);
        // return Movie::all()->toResourceCollection(MovieResource::class);
        return new MovieResource(true, 'List Data Movies', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'original_title' => 'required|string',
            'original_language' => 'required|string',
            'genre' => 'required|string|max:100',
            'popularity' => 'required|numeric',
            'vote_count' => 'required|numeric',
            'vote_average' => 'required|numeric',
            'release_date' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $data = Movie::create($request->all());
        return new MovieResource(true, 'Data Berhasil Ditambahkan', $data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $movies = Movie::findOrFail($id);
        if(!$movies){
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
        }
         
        return $movies->toResource(MovieResource::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movies = Movie::findOrFail($id);
        if(!$movies){
            return response()->json(['message' => 'Movie not found'], 404);
        }

          $validator = Validator::make($request->all(), [
            'original_title' => 'string',
            'original_language' => 'string',
            'genre' => 'string',
            'popularity' => 'numeric',
            'vote_count' => 'numeric',
            'vote_average' => 'numeric',
            'release_date' => 'date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422 ); 
        }

        $movies->update($request->all());
        return new MovieResource(true, 'Data Berhasil Diupdate', $movies);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movies = Movie::findOrFail($id);
        if(!$movies){
            return response()->json(['message' => 'Movie not found'], 404);
        }
        $movies->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
