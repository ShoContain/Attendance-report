<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $hofe = $this->scheduled_movies;
        return [
            'id' => $this->id,
            'start'=>$this->scheduled_movies->start,
            'movie_name'=>$this->scheduled_movies->movie->name,
            'reserved_seats'=>$this->seat_id,
        ];
    }
}
