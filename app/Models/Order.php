<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_message',
    ];

    public function house(){
        return $this->belongsTo(House::class);
    }



}
