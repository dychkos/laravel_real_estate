<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;

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

}
