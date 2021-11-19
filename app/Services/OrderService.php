<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderService
{

    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function store($data){
        $validated = Validator::make($data,[
            "house_id" => ["required","integer"],
            "customer_name" => ["required","string"],
            "customer_email" => ["required","string"],
            "customer_phone" => ["required","string"],
            "customer_message" => ["required","string"]
        ])->validate();

        return $this->orderRepository->store($validated);

    }

    public function delete($data){
        if(empty($data)){
            throw ValidationException::withMessages(['order_remove_error' => 'No chosen fields']);
        }else{
            return $this->orderRepository->delete($data);
        }

    }

}
