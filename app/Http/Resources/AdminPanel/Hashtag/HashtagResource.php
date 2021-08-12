<?php

namespace App\Http\Resources\AdminPanel\Hashtag;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class HashtagResource extends JsonResource
{
    #[ArrayShape(['hashtag_id' => "mixed", 'hashtag_name' => "mixed", 'hashtag_slug' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'hashtag_id' => $this->id,
            'hashtag_name' => $this->name,
            'hashtag_slug' => $this->slug
        ];
    }
}
