<?php

namespace App\Http\Resources\AdminPanel\Hashtag;

use App\Http\Resources\AdminPanel\Blog\Post\PostsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class HashtagWithPostsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'hashtag_id' => $this->id,
            'hashtag_name' => $this->name,
            'hashtag_slug' => $this->slug,
            'posts' => PostsResource::collection($this->posts)
        ];
    }
}
