<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    /*
     *
     * videos
     */
    public function toArray($request)
    {
        return [


            'id' => $this->id,
            'name' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'description' => lang() == 'ar' ? $this->description_ar : $this->description_en,
            'sets' => $this->sets,
            'reps' => $this->reps,
            'status' => 'lock',
            'muscle_name' => lang() == 'ar' ? $this->muscle_name_ar : $this->muscle_name_en,
            'exercise_type' => lang() == 'ar' ? $this->exercise_type_ar : $this->exercise_type_en,
            'video_minute' => $this->video_minute,
            'video_url' => asset('uploads/exercises/'. $this->video_url)
        ];
    }
}
