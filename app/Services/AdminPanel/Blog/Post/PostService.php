<?php

namespace App\Services\AdminPanel\Blog\Post;

use App\Http\Resources\AdminPanel\Blog\Post\CreatedPostResource;
use App\Http\Resources\AdminPanel\Blog\Post\PostsResource;
use App\Http\Resources\AdminPanel\Blog\Post\PostWithHashtagsResource;
use App\Models\Blog\Post;
use App\Services\AdminPanel\Blog\Post\Methods\CreatePost;
use App\Services\AdminPanel\Blog\Post\Methods\ValidateHashtag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostService
{
    private ValidateHashtag $validateHashtag;
    private CreatePost $createPost;

    public function __construct(ValidateHashtag $validateHashtag, CreatePost $createPost)
    {
        $this->validateHashtag = $validateHashtag;
        $this->createPost = $createPost;
    }


    public function all(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return (PostsResource::collection(Post::query()->with('hashtags')->paginate('5')))
                ->additional(['status' => 200]);
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во загрузки всех постов. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithRelations(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return PostWithHashtagsResource::collection(Post::with('hashtags')->paginate('5'));
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во загрузки всех хэштэгов и постов. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithFilters(): JsonResponse|AnonymousResourceCollection
    {
        try
        {

            return PostWithHashtagsResource::collection(Post::with('hashtags')->paginate('5'));
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во загрузки всех хэштэгов и постов. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function create($data): JsonResponse|CreatedPostResource
    {
        try
        {
            $validatedHashtag = null;
            if (isset($data->hashtag_id))
            {
                $validatedHashtag = $this->validateHashtag->search($data->hashtag_id);
                if ($validatedHashtag instanceof JsonResponse)
                {
                    return $validatedHashtag;
                }
            }

            $createdPost = $this->createPost->create($data, $validatedHashtag);
            if ($createdPost instanceof JsonResponse)
            {
                return $createdPost;
            }

            return (new CreatedPostResource($createdPost))
                ->additional(['status' => 201]);
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время передачи аргументов сервисам создания поста. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function edit($data)
    {
        try
        {
            return 12;
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время создания поста. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }


    public function delete($data)
    {
        try
        {
            return 12;
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время создания поста. Текст ошибки:' . $e,
                'status' => 400], 400);
        }
    }
}
