<?php

namespace App\Http\Resources\AdminPanel\Blog\Post;

use App\Http\Resources\AdminPanel\Hashtag\HashtagResource;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class PostWithHashtagsResource extends JsonResource
{
    #[ArrayShape(['post_id' => "mixed", 'post_name' => "mixed", 'post_description' => "mixed", 'post_background_link' => "mixed", 'hashtags' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])]
    public function toArray($request): array
    {
        return [
            'post_id' => $this->id,
            'post_name' => $this->name,
            'post_description' => $this->description,
            'post_background_link' => $this->background_link,
            'hashtags' => HashtagResource::collection($this->hashtags)
        ];
    }
}
