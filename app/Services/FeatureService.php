<?php

namespace App\Services;

use App\Repositories\FeatureRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FeatureService
{

    protected $featureRepository;

    public function __construct(FeatureRepository $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function store($data)
    {
        $validated = Validator::make($data,[
            "title" => ["required","string","min:3","max:25"]
        ])->validate();

        return $this->featureRepository->store($validated);
    }

    /**
     * @throws ValidationException
     */
    public function delete($data)
    {
        if(empty($data)){
            throw ValidationException::withMessages(['features_remove_error' => 'No chosen fields']);
        }else{
            return $this->featureRepository->delete($data);
        }
    }

}
