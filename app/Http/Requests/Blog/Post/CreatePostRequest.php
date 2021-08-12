<?php

namespace App\Http\Requests\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreatePostRequest extends FormRequest
{
    #[ArrayShape(['name' => "string", 'description' => "string", 'background_link' => "string", 'hashtag_id' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:30|min:5',
            'description' => 'bail|required',
            'background_link' => 'bail|required|file|image|max:3000',
            'hashtag_id' => 'bail'
        ];
    }
}
