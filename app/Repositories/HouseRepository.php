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

    public function store($data){

        $house = new $this->house;

        $house->name=$data['name'] ;
        $house->price=$data['price'];
        $house->address=$data['address'];
        $house->description=$data['description'];
        $house->ft_price=$data['ft_price'];
        $house->bedrooms_count=$data['bedrooms_count'];
        $house->showers_count=$data['showers_count'] ;
        $house->bedrooms_count=$data['bedrooms_count'];
        $house->floors_count=$data['floors_count'];
        $house->garage_count=$data['garage_count'];
        $house->founded_year=$data['founded_year'];

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

    public function update($data)
    {
        $house = new $this->house;
        $house = $house->find($data['id']);

        if(!empty($data["images"])){
            $house->images()->delete();
            $house->images()->createMany($data['images']);
        }

        if(!empty($data["features"])){
            $house->features()->sync($data['features']);
        }

        $house->update($data);

        return $house->fresh();
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
