<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Movie;
use App\Models\ScheduledMovie;
use App\Http\Resources\ScheduledMovieResource;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    const ITEM_PER_PAGE = 15;
    const ITEM_PAGE = 1;
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $page = Arr::get($searchParams, 'page', static::ITEM_PAGE);
        $offset = $limit * ($page - 1);
        $date = Arr::get($searchParams, 'date', '');

        $movies = ScheduledMovie::whereDate('start', $date)->orderBy('start','ASC')->offset($offset)->limit($limit)->get();
        return ScheduledMovieResource::collection($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $movie = Movie::find($id);

        if(!$movie){
            return response()->json([
                'message' => "お探しの映画は見つかりませんでした。"
            ],Response::HTTP_NOT_FOUND
            ); 
        }
        return new MovieResource($movie);
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
