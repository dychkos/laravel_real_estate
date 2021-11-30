<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Comment;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse(UserResource::collection($users),'Retrieved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        try {
            $user = User::find($user->id);
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,[],$exception->status);
        }
        return $this->sendResponse(new UserResource($user),'Retrieved successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user,UserService $userService)
    {
        $image_url = [];

        if($file = $request->file('image')){
            $image_url = Helper::upload_image(array($file),"users");
        }

        $updatedUser = array(
            'id' => Auth::user()->id,
            'name' => $request->input('name'),
            'image' => $image_url,
        );

        try {
            $result = $userService->update($updatedUser);
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        return $this->sendResponse($result,"Updated successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user,UserService $userService)
    {
        try {
            $result = $userService->delete($user->id);
        }catch (\Exception $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Removed successful");
    }
}
