<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Hashtag extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'hashtag';
    }
}
