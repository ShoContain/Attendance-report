<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Seat;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $auditoriumName = $this->auditorium->name;
        $rows = $this->auditorium->rows;
        $seats = $rows->map(function($row){
            return Seat::where('row_id','=',$row->id)->get()->toArray();
        });
        $occupiedSeats = Reservation::where('scheduled_movie_id',$this->id)->get()->toArray();
        
        return [
            'scheduled_movie_id' => $this->id,
            'user_id'=>Auth::id(),
            'auditorium_name'=>$auditoriumName,
            'rows'=>$seats,
            'occupied_seats'=>array_map(function($occupiedSeat){
                return $occupiedSeat['seat_id'];
            },$occupiedSeats)
        ];
    }
}
