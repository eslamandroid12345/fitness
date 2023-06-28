<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'title' => lang() == 'ar' ? $this->title_ar : $this->title_en,
            'description' => lang() == 'ar' ? $this->description_ar : $this->description_en,
            'exercises_count' => $this->exercises->count(),
            'exercises' => ExerciseResource::collection($this->exercises),
        ];
    }
}
