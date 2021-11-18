<?php

namespace App\Services;

use App\Repositories\HouseRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class HouseService
{
    protected $houseRepository;

    public function __construct(HouseRepository $houseRepository)
    {
        $this->houseRepository = $houseRepository;
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveHouseData($house){

        $validated = Validator::make($house,[
            'name' => ["required","string","max:25"],
            'description' =>["required","string"],
            'images' => ["required","array","min:3","max:7"],
            'features' => ["nullable","array"],
            'price' => ["required","integer"],
            'ft_price' => ["required","integer"],
            'address' => ["required","string"],
            'bedrooms_count' => ["nullable","integer"],
            'showers_count' => ["nullable","integer"],
            'garage_count' => ["nullable","integer"],
            'floors_count' => ["nullable","integer"],
            'founded_year' => ["required","integer"],
        ])->validate();


        return $this->houseRepository->save($validated);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($house){

        $validated = Validator::make($house,[
            'id' => ["required","integer"],
            'name' => ["required","string","max:25"],
            'description' =>["nullable","string"],
            'images' => ["nullable","array","max:7"],
            'features' => ["nullable","array"],
            'price' => ["nullable","integer"],
            'ft_price' => ["nullable","integer"],
            'address' => ["nullable","string"],
            'bedrooms_count' => ["nullable","integer"],
            'showers_count' => ["nullable","integer"],
            'garage_count' => ["nullable","integer"],
            'floors_count' => ["nullable","integer"],
            'founded_year' => ["nullable","integer"],
        ])->validate();

        return $this->houseRepository->save($validated);

    }

    public function show($house_id){
        return $this->houseRepository->show($house_id);
    }

    public function showForUser(){
        return $this->houseRepository->showForUser();
    }

}
