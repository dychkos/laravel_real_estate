<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        return view("comments.create",compact("user"));
    }

    public function store(CommentService $commentService,Request $request){
        $image_url = [];

        if($file = $request->file('image')){
            $image_url = Helper::upload_image(array($file),"comments");
        }

        $commentData = [
            "author_name" => $request->input("author_name"),
            "author_message" => $request->input("author_message"),
            "author_image" =>$image_url,
        ];

        $commentService->store($commentData);

        return redirect()->route("home");

    }
}
