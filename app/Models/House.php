<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'ft_price' ,
        'address' ,
        'bedrooms_count',
        'showers_count' ,
        'floors_count' ,
        'garage_count' ,
        'founded_year'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Image::class, 'image');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function features(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Feature::class,'houses_features',
            'house_id',
            'feature_id');
    }


}
