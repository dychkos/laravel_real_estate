<?php

namespace App\Repositories;

use App\Models\House;
use App\Models\Houses_images;
use Illuminate\Support\Facades\Auth;

class HouseRepository
{
    protected $house;

    public function __construct(House $house)
    {
        $this->house=$house;
    }

    public function save($data){

        $house = new $this->house;

        if(!empty($data['id'])){
            $house = $house->find($data['id']);
        }

        $house->name=$data['name'] ?? "";
        $house->price=$data['price'] ?? 0;
        $house->address=$data['address'] ?? "";


        $house->description=$data['description'] ?? "";
        $house->ft_price=$data['ft_price'] ??"";
        $house->bedrooms_count=$data['bedrooms_count'] ?? 0;
        $house->showers_count=$data['showers_count'] ?? 0;
        $house->bedrooms_count=$data['bedrooms_count'] ??0;
        $house->floors_count=$data['floors_count'] ?? 0;
        $house->garage_count=$data['garage_count'] ?? 0;
        $house->founded_year=$data['founded_year'] ?? 0;

        $user_id = Auth::user()->id;
        $house->user_id = $user_id;

        $house->save();

        if(!empty($data["images"])){
            $house->images()->delete();
            $house->images()->createMany($data['images']);
        }

        if(!empty($data["features"])){
            $house->features()->sync($data['features']);
        }

        $house->fresh();

        return $house ;

    }

    public function show($house_id){
        $house = new $this->house;
        return $house->find($house_id);
    }

    public function showForUser(){
        $house = new $this->house;
        $user_id = Auth::user()->id;
        return $house->where("user_id",$user_id)->get();
    }

}
