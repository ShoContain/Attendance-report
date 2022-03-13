<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Seat;

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
        
        return [
            'id' => $this->id,
            'auditorium_name'=>$auditoriumName,
            'seats'=>$seats,
        ];
    }
}
