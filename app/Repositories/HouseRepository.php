<?php

namespace App\Repositories;

use App\Models\House;
use Illuminate\Support\Facades\Auth;

class HouseRepository
{
    protected $model;

    public function __construct(House $model)
    {
        $this->model=$model;
    }

    public function store($data)
    {

        $model = $this->model::create([
            'user_id'=>Auth::user()->id,
            'name'=>$data['name'],
            'price'=>$data['price'],
            'address'=>$data['address'],
            'ft_price'=>$data['ft_price'],
            'description'=>$data['description'],
            'founded_year'=>$data['founded_year'],
            'bedrooms_count'=>$data['bedrooms_count'],
            'showers_count'=>$data['showers_count'],
            'floors_count'=>$data['floors_count'],
            'garage_count'=>$data['garage_count']
        ]);


        if(!empty($data["images"])){
            $model->images()->delete();
            $model->images()->createMany($data['images']);
        }

        if(!empty($data["features"])){
            $model->features()->sync($data['features']);
        }

        $model->fresh();

        return $model ;

    }

    public function update($data)
    {
        $model = $this->model::find($data['id']);

        if(!empty($data["images"])){
            $model->images()->delete();
            $model->images()->createMany($data['images']);
        }

        if(!empty($data["features"])){
            $model->features()->sync($data['features']);
        }

        $model->update($data);

        return $model->fresh();
    }

    public function show($model_id){
        $model = new $this->model;
        return $model->find($model_id);
    }

    public function showForUser(){
        $model = new $this->model;
        $user_id = Auth::user()->id;
        return $model->where("user_id",$user_id)->get();
    }

    public function delete($house_id){
        $model = new $this->model;
        return $model->destroy($house_id);
    }

}
