<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public function houses(){
        return $this->belongsToMany(House::class,'houses_features',
            'feature_id',
            'house_id');
    }
}
