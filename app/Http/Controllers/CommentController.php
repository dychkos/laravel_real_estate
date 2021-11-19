<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        return view("comments.create");
    }

    public function store(CommentService $commentService,Request $request){
        $image_url = "";

        if($file = $request->file('image')){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = "uploads/comments/";
            $image_url = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
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
