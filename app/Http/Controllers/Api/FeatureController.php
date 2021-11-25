<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use App\Services\FeatureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FeatureController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $features = Feature::all();
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        return $this->sendResponse(FeatureResource::collection($features),'Retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FeatureService $featureService,Request $request)
    {
        $createdFeature = array(
            "title" => $request->input("title")
        );

        try {
            $result = $featureService->store($createdFeature);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Created successful");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Feature $feature)
    {
        try {
            $feature = Feature::find($feature->id);
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,[],$exception->status);
        }
        return $this->sendResponse(new FeatureResource($feature),'Retrieved successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Feature $feature,FeatureService $featureService)
    {
        try {
            $result =  $featureService->delete($feature->id);;
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Removed successful");
    }
}
