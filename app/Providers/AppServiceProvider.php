<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {
        $this->app->bind('post', 'App\Services\AdminPanel\Blog\Post\PostService');
        $this->app->bind('hashtag', 'App\Services\AdminPanel\Hashtag\HashtagService');

    }
}
