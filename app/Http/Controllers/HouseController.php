<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Services\HouseService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HouseController extends Controller
{
    public function index(){
        $houses = \App\Models\House::all();
        return view('houses',compact('houses'));
    }

    public function showOne($house_id){
        $house = \App\Models\House::find($house_id);
        return view('house_page',compact('house'));
    }

    public function addShow(Request $request){
        Session::put('requestReferrer', URL::previous());
        return view('house_add');
    }

    public function store(HouseService $houseService,Request $request){

        if($request->hasfile('photo_previews'))
        {
            $file = $request->file('photo_previews');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/houses/', $filename);
        }

        $createdHouse = array(
            'name' => $request->input('house_title'),
            'description' => $request->input('description'),
            'image' => $filename ?? "",
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
            $result = $houseService->saveHouseData($createdHouse);

        }catch (\Exception $e){
            $result = [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }

        return \response()->json($result);

    }
}
