<?php

namespace App\Http\Resources;

use App\Models\House;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "customer_name"=>$this->customer_name,
            "customer_email"=>$this->customer_email,
            "customer_phone"=>$this->customer_phone,
            "customer_message"=>$this->customer_message,
            "house"=>new HouseResource($this->house)
        ];
    }
}
