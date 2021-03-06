<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $fillable = [
        'name',
        'description' ,
        'image' ,
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

}
