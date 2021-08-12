<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Post extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'post';
    }
}
