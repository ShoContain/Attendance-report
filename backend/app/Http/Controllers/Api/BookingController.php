<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScheduledMovie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\BookingResource;
use App\Http\Resources\ReservationResource;
use App\Http\Requests\BookingRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(BookingRequest $request)
    {
        $scheduledMovie = ScheduledMovie::find($request->scheduled_movie_id);
        if (!$scheduledMovie) {
            return response()->json(
                [
                    'message' => "お探しの映画は見つかりませんでした。"
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        $occupiedSeats = Reservation::where('scheduled_movie_id', $request->scheduled_movie_id)
            ->whereIn('seat_id', $request->selected_seat)
            ->get()
            ->toArray();

        if (!empty($occupiedSeats)) {
            return response()->json(
                [
                    'message' => "席が既に予約されています。"
                ],
                Response::HTTP_CONFLICT
            );
        } else {
            $result =  DB::transaction(function () use ($request) {

                foreach($request->selected_seat as $index =>$seatId ){
                    $data[$index]['seat_id'] = $seatId;
                    $data[$index]['user_id'] = Auth::id();
                    $data[$index]['scheduled_movie_id'] = $request->scheduled_movie_id;
                    $data[$index]['created_at'] = Carbon::now();
                }
                    return Reservation::insert($data);
            });

            if(!$result){
                return response()->json(
                    [
                        'message' => "席が既に予約されています。"
                    ],
                    Response::HTTP_CONFLICT
                );
            } 

            $reservations =  Reservation::where('scheduled_movie_id', $request->scheduled_movie_id)
                                        ->whereIn('seat_id', $request->selected_seat)
                                         ->get();
            return ReservationResource::collection($reservations);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = ScheduledMovie::find($id);

        if (!$schedule) {
            return response()->json(
                [
                    'message' => "お探しの映画は見つかりませんでした。"
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        return new BookingResource($schedule);
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
