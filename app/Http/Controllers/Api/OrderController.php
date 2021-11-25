<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = Auth::user()->orders->orderBy('created_at',"DESC")->get();
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        return $this->sendResponse(OrderResource::collection($orders),'Retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderService $orderService,Request $request)
    {
        $createdOrder = array(
            "house_id" => $request->input("house_id"),
            "customer_name" => $request->input("customer_name"),
            "customer_email" => $request->input("customer_email"),
            "customer_phone" => $request->input("customer_phone"),
            "customer_message" => $request->input("customer_message")
        );

        try {
            $result = $orderService->store($createdOrder);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Created successful");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Order $order)
    {
        try {
            $order_id = Order::find($order->id);
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,[],$exception->status);
        }
        return $this->sendResponse(new OrderResource($order_id),'Retrieved successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Order $order,OrderService $orderService)
    {
        try {
            $result =  $orderService->delete($order->id);;
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Removed successful");
    }
}
