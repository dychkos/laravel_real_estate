<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Services\HouseService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HouseController extends Controller
{
    public function index(){
        $houses = \App\Models\House::all();
        return view('houses.index',compact('houses'));
    }

    public function show($house_id){
        $house = \App\Models\House::find($house_id);

//        if(Auth::user()->accessEdit($house_id)){
//            $access = ["access"=>true];
//            return view('houses.show',[compact('house','access')]);
//        }
        return view('houses.show',compact('house'));
    }

    public function create(Request $request){
        return view('user.houses.create');
    }

    public function showForUser(HouseService $houseService){
        $houses = $houseService->showForUser();
        return view('user.houses.index',compact('houses'));
    }

    public function store(HouseService $houseService,Request $request){

        if($files = $request->file('image')){
            $houseImages = $this->uploadImages($files);
        }

        $createdHouse = array(
            'user_id' => Auth::user()->id,
            'name' => $request->input('house_title'),
            'description' => $request->input('description'),
            'images' => $houseImages ?? [],
            'price' => $request->input('price'),
            'ft_price' => $request->input('ft_price'),
            'address' => $request->input('address'),
            'bedrooms_count' =>  $request->input('bedrooms_count'),
            'showers_count' =>  $request->input('showers_count'),
            'floors_count' =>  $request->input('floors_count'),
            'garage_count' =>  $request->input('garage_count'),
            'founded_year' => $request->input("founded_year")
        );


        $result = $houseService->saveHouseData($createdHouse);

        return redirect()->route("houses.show",["id"=>$result->id]);
    }


    public function edit(HouseService $houseService,Request $request,$house_id){
        $house = $houseService->show($house_id);
        return view("user.houses.edit",compact("house"));

    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(HouseService $houseService, Request $request){

        if($files = $request->file('image')){
            $houseImages = $this->uploadImages($files);
        }

        $updatedHouse = array(
            'name' => $request->input('house_title'),
            'description' => $request->input('description'),
            'images' => $houseImages ?? [],
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

    private function uploadImages($files){
        $houseImages = array();

        foreach($files as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = "uploads/houses/";
            $image_url = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
            array_push($houseImages,["filename" => $image_url]);

        }

        return $houseImages;
    }

}
