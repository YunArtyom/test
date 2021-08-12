<?php

namespace App\Http\Controllers\AdminPanel\Hashtags;

use App\Facades\Hashtag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hashtag\CreateHashtagRequest;
use App\Interfaces\AdminPanelHashtagInterface;

class HashtagController extends Controller implements AdminPanelHashtagInterface
{
    public function all()
    {
        try
        {
            return Hashtag::all();
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервиса загрузки всех хэштэгов. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }


    public function allWithRelations()
    {
        try
        {
            return Hashtag::allWithRelations();
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервиса загрузки всех хэштэгов с постами. Текст ошибки: ' . $e,
                'status' => 400], 400);
        }
    }


    public function create(CreateHashtagRequest $request)
    {
        try
        {
            return Hashtag::create($request);
        }
        catch (\Throwable $e)
        {
            return response()->json(['error' => 'Произошла ошибка во время запуска сервисов создания хэштэга. Текст ошибки: ' . $e,
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
