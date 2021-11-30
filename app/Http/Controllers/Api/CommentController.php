<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $comments = Comment::all();
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }
        return $this->sendResponse(CommentResource::collection($comments),'Retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentService $commentService,Request $request)
    {
        $image_url = [];

        if($file = $request->file('image')){
            $image_url = Helper::upload_image(array($file),"comments");
        }

        $commentData = [
            "author_name" => $request->input("author_name"),
            "author_message" => $request->input("author_message"),
            "author_image" =>$image_url,
        ];

        try {
            $result =  $commentService->store($commentData);;
        }catch (ValidationException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Created successful");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $comment)
    {
        try {
            $comment = Comment::find($comment->id);
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,[],$exception->status);
        }
        return $this->sendResponse(new CommentResource($comment),'Retrieved successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment,CommentService $commentService)
    {
        try {
            $result =  $commentService->delete($comment->id);;
        }catch (NotFoundHttpException $exception){
            $message = $exception->getMessage();
            return $this->sendError($message,$exception->errors(),$exception->status);
        }

        return $this->sendResponse($result,"Removed successful");
    }
}
