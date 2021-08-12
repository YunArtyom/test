<?php

namespace App\Http\Resources\AdminPanel\Blog\Post;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CreatedPostResource extends JsonResource
{
    #[ArrayShape(['post_id' => "mixed", 'post_name' => "mixed", 'post_description' => "mixed", 'background_link' => "mixed", 'created_at' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'post_id' => $this->id,
            'post_name' => $this->name,
            'post_description' => $this->description,
            'background_link' => $this->background_link,
            'created_at' => $this->created_at
        ];
    }
}
