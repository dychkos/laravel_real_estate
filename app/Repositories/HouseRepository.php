<?php

namespace App\Repositories;

use App\Models\House;
use App\Models\Houses_images;

class HouseRepository
{
    protected $house;

    public function __construct(House $house)
    {
        $this->house=$house;
    }


    public function save($data){

        $house = new $this->house;

        $house->name=$data['name'];
        $house->description=$data['description'];
        $house->price=$data['price'];


        $house->ft_price=$data['ft_price'];
        $house->address=$data['address'];
        $house->bedrooms_count=$data['bedrooms_count'];
        $house->showers_count=$data['showers_count'];
        $house->bedrooms_count=$data['bedrooms_count'] ;
        $house->floors_count=$data['floors_count'];
        $house->garage_count=$data['garage_count'];
        $house->founded_year=$data['founded_year'];

        $house->save();

        $house->images()->createMany($data['images']);

        $house->fresh();


        return $house ;

    }

}
