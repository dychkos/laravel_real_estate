<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store($data)
    {
        $validated = Validator::make($data,[
            "author_name"=>["required","string","min:3","max:25"],
            "author_message"=>["required","string","max:255"],
            "author_image"=>["required","array"]
        ])->validate();

        return $this->commentRepository->store($validated);
    }

    /**
     * @throws ValidationException
     */
    public function delete($data)
    {
        if(empty($data)){
            throw ValidationException::withMessages(['comment_remove_error' => 'No chosen fields']);
        }else{
            return $this->commentRepository->delete($data);
        }

    }

}
