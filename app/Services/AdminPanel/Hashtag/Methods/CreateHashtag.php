<?php

namespace App\Services\AdminPanel\Hashtag\Methods;

use App\Models\Blog\Hashtag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class CreateHashtag
{
    //Если добаляется какая-либо доп функция или проверка, то можно использовать extend либо написать в самом методе
    public function create($data): Model|Collection|Builder|JsonResponse|array
    {
        try
        {
            return Hashtag::create($data->validated());
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время создания хэштэга. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }
}
