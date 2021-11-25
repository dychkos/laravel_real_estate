<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{

    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($data)
    {
        $comment = $this->comment;
        $comment->author_name = $data["author_name"];
        $comment->author_message = $data["author_message"];
        $comment->save();
        $comment->image()->create($data['author_image'][0]);

        $comment->refresh();

        return $comment;

    }

    public function delete($data)
    {
        $comment = $this->comment;
        return $comment->destroy($data);

    }

}
