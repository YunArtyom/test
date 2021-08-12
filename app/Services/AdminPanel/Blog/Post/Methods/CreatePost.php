<?php

namespace App\Services\AdminPanel\Blog\Post\Methods;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class CreatePost
{
    //Если добаляется какая-либо доп функция или проверка, то можно использовать extend либо написать в самом методе
    public function create($data, $validatedHashtag): Model|Collection|Builder|JsonResponse|array
    {
        try
        {
            if ($validatedHashtag == null)
            {
                return Post::create($data->validated());
            }

            if (is_array($validatedHashtag))
            {
                $newPost = Post::create($data->validated());
                foreach ($validatedHashtag as $hashtag)
                {
                    $newPost->hashtags()->attach($hashtag);

                }
                return $newPost;
            }

            $newPost = Post::create($data->validated());
            $newPost->hashtags()->attach($validatedHashtag);

            return $newPost;
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время создания поста. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }
}
