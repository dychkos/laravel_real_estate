<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\HouseResource;
use App\Models\House;
use App\Services\HouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HouseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();
        return $this->sendResponse(HouseResource::collection($houses),'Retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(HouseService $houseService,Request $request)
    {
        if($files = $request->file('image')){
            $houseImages = Helper::upload_image($files,"houses");
        }


        $createdHouse = array(
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'images' => $houseImages ?? [],
            'features' => $request->input("feature") ?? [],
            'price' => $request->input('price'),
            'ft_price' => $request->input('ft_price'),
            'address' => $request->input('address'),
            'bedrooms_count' =>  $request->input('bedrooms_count'),
            'showers_count' =>  $request->input('showers_count'),
            'floors_count' =>  $request->input('floors_count'),
            'garage_count' =>  $request->input('garage_count'),
            'founded_year' => $request->input("founded_year")
        );

        try {
            $result = $houseService->store($createdHouse);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse(new HouseResource($result),"Created successful");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(House $house)
    {
        try {
            $house = House::find($house->id);
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,[],$exception->status);
        }
        return $this->sendResponse(new HouseResource($house),'Retrieved successfully');

    }

    /**
     * Display houses for current user .
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\JsonResponse
     */
    public function showForUser(HouseService $houseService,Request $request)
    {
        try {
            $result = $houseService->showForUser();
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse(HouseResource::collection($result),'Retrieved successfully');

    }

    /**
     * Display similar houses .
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSimilar(HouseService $houseService,Request $request)
    {
        try {
            $similarHouses = House::inRandomOrder()->limit(7)->get()->except($request->id);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse(HouseResource::collection($similarHouses),'Retrieved successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, House $house,HouseService $houseService)
    {
        $house_id = $house->id;
        if($files = $request->file('image')){
            $houseImages = Helper::upload_image($files,"houses");
        }

        $updatedHouse = array(
            'id' => $house_id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'images' => $houseImages ?? [],
            'features' => $request->input("feature") ?? [],
            'price' => $request->input('price'),
            'ft_price' => $request->input('ft_price'),
            'address' => $request->input('address'),
            'bedrooms_count' =>  $request->input('bedrooms_count'),
            'showers_count' =>  $request->input('showers_count'),
            'floors_count' =>  $request->input('floors_count'),
            'garage_count' =>  $request->input('garage_count'),
            'founded_year' => $request->input("founded_year")
        );

        try {
            $result = $houseService->update($updatedHouse);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Updated successful");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(House $house,HouseService $houseService)
    {
        try {
            $result =  $houseService->delete($house->id);;
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Removed successful");
    }
}
