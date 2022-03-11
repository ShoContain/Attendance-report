<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $start = new Carbon($this->start);
        return [
            'id' => $this->id,
            'movie_id'=>$this->movie_id,
            'name'=>$this->movie->name,
            'image_path'=> 'image/'.$this->movie->image_path,
            'start' => $start->format('Y年m月d日 H時i分s秒'),
            'end' => $this->end,
            'price'=>$this->price
        ];
    }
}
