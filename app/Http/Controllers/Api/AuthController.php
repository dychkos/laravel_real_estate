<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(UserService $userService,Request $request){
        $data = $request->all();
        try {
            $user = $userService->store($data);;
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        return $this->sendResponse(new UserResource($user),"Registration Successful");
    }

    public function login(UserService $userService,Request $request){
        try {
            $user = $userService->login($request->all());
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $responseMessage = "Login Successful";
        return $this->respondWithToken($accessToken,$responseMessage,new UserResource(auth()->user()));
    }

    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function checkAuth(Request $request){
        $isAuth = Auth::guard('api')->check();
        if(!$isAuth){
            return $this->sendError("Token is not valid",[],401);
        }
        $user = Auth::guard('api')->user();
        return response()->json([
            'auth' => $isAuth,
            'user' => new UserResource($user),
        ]);

    }




}
