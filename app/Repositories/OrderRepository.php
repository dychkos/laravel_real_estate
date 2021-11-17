<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function store($data)
    {
        $order  = $this->order;

        $order->house_id = $data["house_id"];
        $order->customer_name = $data["customer_name"];
        $order->customer_phone = $data["customer_phone"];
        $order->customer_email = $data["customer_email"];
        $order->customer_message = $data["customer_message"];
        $order->save();
        $order->fresh();

        return $order;
    }

}
