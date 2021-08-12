<?php


use App\Http\Requests\Blog\Post\CreatePostRequest;

interface PostInterface
{
    public function all();

    public function afterFilter();
}
