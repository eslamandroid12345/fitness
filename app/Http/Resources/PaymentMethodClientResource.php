<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodClientResource extends JsonResource
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
            'number' => $this->number,
            'exp_month' => $this->exp_month,
            'exp_year' => $this->exp_year,
            'cvc' => $this->cvc


        ];
    }
}
