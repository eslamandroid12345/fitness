<?php

namespace App\Http\Resources;

use App\Models\UserSubscribe;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramDetailSubscribeResource extends JsonResource
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
            'level' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'price' => (double)$this->price,
            'image' => asset('uploads/programs/' . $this->image),

        ];
    }
}
