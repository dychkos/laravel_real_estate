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


    public function saveHouseData($data){

        $validator = validator::make($data,[
            'name' => "required",
            'description' => "required",
            'image' => "required",
            'price' => "required",
            'ft_price' => "required",
            'address' => "required",
            'founded_year' => "required"
        ]);

        if($validator->fails()){
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $this->houseRepository->save($data);
    }

}
