<?php

namespace App\Http\Controllers\AdminPanel\Blog;

use App\Facades\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\CreatePostRequest;
use App\Http\Resources\AdminPanel\Blog\Post\CreatedPostResource;
use App\Interfaces\AdminPanelPostInterface;
use App\ModelFilters\PostFilter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller implements AdminPanelPostInterface
{
    public function all(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return Post::all();
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервиса загрузки всех постов. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithRelations(): JsonResponse|AnonymousResourceCollection
    {
        try
        {
            return Post::allWithRelations();
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервиса загрузки всех постов с хэштэгами. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithFilters(Request $request)
    {
        try
        {
            $postFiler = PostFilter::class;

            return \App\Models\Blog\Post::filter($request->all(), $postFiler)->get();
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервиса загрузки всех постов с хэштэгами. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }


    public function create(CreatePostRequest $request): JsonResponse|CreatedPostResource
    {
        try
        {
            return Post::create($request);
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервисов создания поста. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
