<?php

namespace App\Services\AdminPanel\Hashtag;

use App\Http\Resources\AdminPanel\Hashtag\CreatedHashtagResource;
use App\Http\Resources\AdminPanel\Hashtag\HashtagResource;
use App\Http\Resources\AdminPanel\Hashtag\HashtagWithPostsResource;
use App\Models\Blog\Hashtag;
use App\Services\AdminPanel\Hashtag\Methods\CreateHashtag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HashtagService
{
    private CreateHashtag $createHashtag;

    public function __construct(CreateHashtag $createHashtag)
    {
        $this->createHashtag = $createHashtag;
    }


    public function all(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return HashtagResource::collection(Hashtag::paginate('5'));
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во загрузки всех хэштэгов. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithRelations(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return HashtagWithPostsResource::collection(Hashtag::with('posts')->paginate('5'));
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во загрузки всех хэштэгов и постов. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function create($data): JsonResponse|CreatedHashtagResource
    {
        try
        {
            $createdHashtag = $this->createHashtag->create($data);
            if ($createdHashtag instanceof JsonResponse)
            {
                return $createdHashtag;
            }

            return (new CreatedHashtagResource(Hashtag::query()->find($createdHashtag->id)))
                ->additional(['status' => 201]);
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время передачи аргументов сервису создания хэштэга. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function edit()
    {

    }


    public function delete()
    {

    }
}
