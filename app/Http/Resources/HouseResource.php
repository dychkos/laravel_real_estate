<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "user" =>  new UserResource($this->user),
            "description" => $this->description,
            "features" =>FeatureResource::collection($this->features),
            "images" =>ImageResource::collection($this->images),
            "price" => $this->price,
            "ft_price" => $this->ft_price,
            "address" => $this->address,
            "bedrooms_count" => $this->bedrooms_count,
            "showers_count" => $this->showers_count,
            "garage_count" => $this->garage_count,
            "floors_count" => $this->floors_count
        ];
    }
}
