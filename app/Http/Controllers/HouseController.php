<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Feature;
use App\Models\House;
use App\Services\HouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function index(){
        $houses = \App\Models\House::all();
        $comments = \App\Models\Comment::all();
        return view('houses.index',compact('houses',"comments"));
    }

    public function show($house_id){
        $house = House::find($house_id);
        $user = Auth::user();
        $similarHouses = House::inRandomOrder()->limit(7)->get()->except($house_id);
        return view('houses.show',compact('house',"user","similarHouses"));
    }

    public function create(Request $request){
        $features = \App\Models\Feature::all();
        return view('user.houses.create',compact("features"));
    }

    public function showForUser(HouseService $houseService){
        $houses = $houseService->showForUser();
        $user = Auth::user();
        return view('user.houses.index',compact('houses','user'));
    }

    public function store(HouseService $houseService,Request $request){
        if($files = $request->file('image')){
            $houseImages = Helper::upload_image($files,"houses");
        }

        $createdHouse = array(
            'user_id' => Auth::user()->id,
            'name' => $request->input('house_title'),
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


        $result = $houseService->store($createdHouse);

        return redirect()->route("houses.show",["id"=>$result->id]);
    }


    public function edit(HouseService $houseService,Request $request,$house_id){
        $house = House::find($house_id);
        $features = Feature::all();
        return view("user.houses.edit",compact("house","features"));

    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(HouseService $houseService, Request $request){

        if($files = $request->file('image')){
            $houseImages = Helper::upload_image($files,"houses");
        }

        $updatedHouse = array(
            'id' => $request->id,
            'name' => $request->input('house_title'),
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


        $result = $houseService->update($updatedHouse);

        return redirect()->route("user.houses.show",["id"=>$result->id]);
    }

}
