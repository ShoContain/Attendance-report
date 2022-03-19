<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Models\Auditorium;

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
        $categories = $this->categories->toArray();
        $schedules = $this->scheduledMovies->toArray();

        foreach($schedules as $index =>$schedule){
            $schedules[$index]['auditorium_name'] = Auditorium::find($schedule['auditorium_id'])->name;
            unset($schedules[$index]['auditorium_id']);

            $start = new Carbon($schedule['start']);
            $schedules[$index]['start'] = $start->format('Y年m月d日 H時i分s秒');

            $end = new Carbon($schedule['end']);
            $schedules[$index]['end'] = $end->format('Y年m月d日 H時i分s秒');
        }

        return [
            'id' => $this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'minutes'=>$this->minutes,
            'image_path'=> '/image/'.$this->image_path,
            'schedules'=>$schedules,
            'categories'=>array_map(function($category){
                return $category['name'];
            },$categories)
        ];
    }
}
