<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        return view("user.houses.index");
    }

    public function edit(Request $request){
        $user = Auth::user();
        return view("user.edit",compact('user'));
    }

    public function update(UserService $userService,Request $request){

        $image_url = [];

        if($file = $request->file('image')){
            $image_url = Helper::upload_image(array($file),"users");
        }

        $updatedUser = array(
            'id' => Auth::user()->id,
            'name' => $request->input('name'),
            'image' => $image_url,
        );

        $result = $userService->update($updatedUser);

        return redirect()->route("user.houses");

    }



}
