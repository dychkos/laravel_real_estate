<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feature;
use App\Models\House;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Services\CommentService;
use App\Services\FeatureService;
use App\Services\HouseService;
use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        $houses = House::all();
        $comments = Comment::all();
        $orders = Order::all();
        $features = Feature::all();
        $roles = Role::all();
        return view("admin.dashboard.index",compact("users","houses","orders","features","roles","comments"));
    }

    public function usersShow(Request $request){
        $users = User::all();
        $roles = Role::all();
        return view("admin.users.index",compact("users","roles"));
    }

    public function housesShow(Request $request){
        $houses = House::all();
        return view("admin.houses.index",compact("houses"));
    }

    public function ordersShow(Request $request){
        $orders = Order::all();
        return view("admin.orders.index",compact("orders"));
    }

    public function storeFeatures(FeatureService $featureService,Request $request){
        $createdFeature = array(
            "title" => $request->input("title")
        );

        $result = $featureService->store($createdFeature);
        return redirect()->back()->with('feature_created', 'Feature successful added');


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

    public function updateUsers(UserService $userService,Request $request){
        $requestData = $request->all();

        $usersArray = $this->processRequestData($requestData,"user");

        foreach ($usersArray as $id => $items){
            $userService->update(array_merge(["id"=>$id],$items));
        };

        return redirect()->back()->with('users_updated', 'Users successful updated');

    }

    public function updateHouses(HouseService $houseService,Request $request){
        $requestData = $request->all();
        $housesArray = $this->processRequestData($requestData,"house");

        foreach ($housesArray as $id => $items){
            $houseService->update(array_merge(["id"=>$id],$items));
        };

        return redirect()->back()->with('houses_updated', 'Houses successful updated');


    }

    public function deleteComments(CommentService $commentService, Request $request){

        $requestData = $request->all();
        $deleteArray = [];

        foreach($requestData as $key =>$value){
            if (str_contains($key,"remove_comment")){
                array_push($deleteArray,$value);
            }
        }

        $commentService->delete($deleteArray);

        return redirect()->back()->with('comment_removed', 'Comments successful removed');
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
