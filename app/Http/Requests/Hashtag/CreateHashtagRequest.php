<?php

namespace App\Http\Requests\Hashtag;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateHashtagRequest extends FormRequest
{
    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:20|unique:hashtags'
        ];
    }
}
