<?php

namespace App\Repositories;

use App\Models\Feature;

class FeatureRepository
{
    protected $model;

    public function __construct(Feature $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $model = $this->model::create([
            "title" =>  $data["title"]
        ]);
        $model->fresh();
        return $model;
    }

    public function delete($data)
    {
        $model = $this->model;
        return $model->destroy($data);
    }

}
