<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index (Request $request)
    {
        $orders =  [];
        if(Auth::user()->orders){
            $orders = Auth::user()->orders->orderBy('created_at',"DESC")->get();
        }
        return view("user.orders.index",compact("orders"));
    }

    public function store(OrderService $orderService,Request $request)
    {
        $createdOrder = array(
          "house_id" => $request->id,
          "customer_name" => $request->input("customer_name"),
          "customer_email" => $request->input("customer_email"),
          "customer_phone" => $request->input("customer_phone"),
          "customer_message" => $request->input("customer_message")
        );

        $result = $orderService->store($createdOrder);

        return redirect()->back()->with('message', 'Order successful added');;
    }

}
