<?php

namespace App\Repositories;

use App\Models\Feature;

class FeatureRepository
{
    protected $feature;

    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
    }

    public function store($data)
    {
        $feature = $this->feature;

        $feature->title = $data["title"];
        $feature->save();

        $feature->fresh();
        return $feature;
    }

    public function delete($data)
    {
        $feature = $this->feature;
        return $feature->destroy($data);

    }

}
