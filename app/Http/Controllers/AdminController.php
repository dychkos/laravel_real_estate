<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\House;
use App\Models\Order;
use App\Models\User;
use App\Services\FeatureService;
use App\Services\HouseService;
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

    public function updateHouses(HouseService $houseService,Request $request){
        $requestData = $request->all();

        $housesArray = $this->processRequestData($requestData,"house");

        foreach ($housesArray as $id => $items){
            House::find($id)->update($items);
            //$houseService->update(array_merge(["id"=>$id],$items));
        };

        return redirect()->back()->with('houses_updated', 'Houses successful updated');


    }

    public function deleteComments(Request $request){

    }

    private function processRequestData($requestData,$requestKey): array
    {
        $processedArray = [];

        foreach($requestData as $key =>$value){
            if (str_contains($key,$requestKey)){
                $exploded = explode("-",$key);
                $updated_id = $exploded[1];
                $updated_key = $exploded[2];
                if(empty($processedArray)){
                    $processedArray = [strval($updated_id) =>[$updated_key => $value]];
                }else{
                    foreach ($processedArray as $id => $item){
                        if($id == $updated_id){
                            $processedArray[$id] = array_merge($item,[$updated_key => $value]);
                        }else{
                            $processedArray[$updated_id] = [$updated_key => $value];
                        }
                    }
                }
            }
        }

        return $processedArray;
    }


}
