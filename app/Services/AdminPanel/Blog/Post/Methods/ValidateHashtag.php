<?php

namespace App\Services\AdminPanel\Blog\Post\Methods;

use App\Models\Blog\Hashtag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ValidateHashtag
{
    //Если добаляется какая-либо доп функция или проверка, то можно использовать extend либо написать в самом методе
    public function search($hashtagId): Model|Collection|Builder|JsonResponse|\Illuminate\Support\Collection|array|int
    {
        try
        {
            if (strpos($hashtagId, ',') == true)
            {
                $validatedHashtags = explode(',', $hashtagId);

                $hashtag = Hashtag::query()->whereIn('id', $validatedHashtags)->pluck('id');

                if ($hashtag->isEmpty())
                {
                    return response()->json(['warning' => 'Хэштэги, которые вы используете для поста не существуют',
                        'status' => 400], 400);
                }
                return $hashtag;
            }

            $hashtag = Hashtag::query()->find($hashtagId);
            if ($hashtag == null)
            {
                return response()->json(['warning' => 'Хэштэга, который вы используете для поста не существует',
                    'status' => 400], 400);
            }

            return $hashtag->id;
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время поиска хэштэга. Текст ошибки: '. $e,
                'status' => 400], 400);
        }
    }
}
