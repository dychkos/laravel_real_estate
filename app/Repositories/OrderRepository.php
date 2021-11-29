<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $model  = $this->model::create([
            'house_id'=>$data["house_id"],
            'customer_name'=>$data["customer_name"],
            'customer_phone'=>$data["customer_phone"],
            'customer_email'=>$data["customer_email"],
            'customer_message'=>$data["customer_message"],
        ]);

        $model->fresh();
        return $model;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}
