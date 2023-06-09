<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        'full_name' => $this->full_name,
        'email' => $this->email,
        'phone' => $this->phone,
        'token' => 'Bearer ' . $this->token,
        'image' => $this->image != null ? asset('uploads/users/'.$this->image): asset('uploads/users/default/user.png'),
        'created_at' => $this->created_at->format('Y-m-d'),
        'updated_at' => $this->created_at->format('Y-m-d'),
    ];
    }
}
