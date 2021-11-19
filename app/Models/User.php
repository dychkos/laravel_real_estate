<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    protected $fillable = [
        'name',
        'role_id',
        'email'   ,
        'password',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function houses() : HasMany
    {
        return $this->hasMany(House::class);
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'image');
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(Order::class,House::class);
    }

    public function isAdmin():bool
    {
        return $this->role->title == "admin";
    }

    public function canEdit($house_id): bool
    {
       return $this->houses()->where("id",$house_id)->get()->isNotEmpty();
    }


}
