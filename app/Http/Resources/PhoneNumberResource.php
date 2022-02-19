<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneNumberResource extends JsonResource
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
            'country' => $this->country,
            'country_code' => '+' . $this->country_code,
            'is_valid_phone' => $this->is_valid_phone,
            'phone_without_country_code' => $this->phone_without_country_code,
        ];
    }
}
