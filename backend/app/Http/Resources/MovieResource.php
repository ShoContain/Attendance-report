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
        $schedules = $this->scheduledMovies->toArray();
        $categories = $this->categories->toArray();
        return [
            'id' => $this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'minutes'=>$this->minutes,
            'image_path'=> '/image/'.$this->image_path,
            'schedules'=>array_map(function($schedule){
                $start = new Carbon($schedule['start']);
                return $start->format('Y年m月d日 H時i分s秒');
            },$schedules),
            'categories'=>array_map(function($category){
                return $category['name'];
            },$categories)
        ];
    }
}
