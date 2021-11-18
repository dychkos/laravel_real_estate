<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\House;
use App\Models\Order;
use App\Models\User;
use App\Services\FeatureService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        $houses = House::all();
        $orders = Order::all();
        $features = Feature::all();
        return view("admin.dashboard.index",compact("users","houses","orders","features"));
    }

    public function storeFeatures(FeatureService $featureService,Request $request){
        $createdFeature = array(
            "title" => $request->input("title")
        );

        $result = $featureService->store($createdFeature);
        return redirect()->back()->with('feature_created', 'Feature successful added');;


    }

    public function deleteFeatures(FeatureService $featureService,Request $request){

        $requestData = $request->all();
        $deleteArray = [];

        foreach($requestData as $key =>$value){
            if (str_contains($key,"remove_feature")){
                array_push($deleteArray,$value);
            }
        }

        $featureService->delete($deleteArray);

        return redirect()->back()->with('feature_removed', 'Features successful removed');

    }

    public function updateUsers(Request $request){

    }

    public function updateHouses(Request $request){

    }

    public function deleteComments(Request $request){

    }


}
