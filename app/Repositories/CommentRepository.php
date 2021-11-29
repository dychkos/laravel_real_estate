<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{

    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $model = $this->model::create([
            'author_name' => $data["author_name"],
            'author_message' => $data["author_message"],

        ]);
        $model->image()->create($data['author_image'][0]);
        $model->refresh();

        return $model;

    }

    public function delete($data)
    {
        $model = $this->model;
        return $model->destroy($data);

    }

}
