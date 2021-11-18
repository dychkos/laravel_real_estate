<?php

namespace App\Services;

use App\Repositories\FeatureRepository;
use Illuminate\Support\Facades\Validator;

class FeatureService
{

    protected $featureRepository;

    public function __construct(FeatureRepository $featureRepository){
        $this->featureRepository = $featureRepository;
    }

    public function store($data)
    {
        $validated = Validator::make($data,[
            "title" => ["required","string","min:3","max:25"]
        ])->validate();

        return $this->featureRepository->store($validated);
    }

    public function delete($data)   {

        return $this->featureRepository->delete($data);
    }

}
