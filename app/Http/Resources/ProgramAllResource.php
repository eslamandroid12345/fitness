<?php

namespace App\Http\Resources;

use App\Models\UserSubscribe;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramAllResource extends JsonResource
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
            'description' => lang() == 'ar' ? $this->description_ar : $this->description_en,
            'image' => asset('uploads/programs/' . $this->image),
            'status' => (UserSubscribe::query()->where('user_id','=',auth('user-api')->id())->where('program_id','=',$this->id)->first()) ? 'opened' :'locked',

        ];
    }
}
