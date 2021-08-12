<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PostFilter extends ModelFilter
{
    public $relations = [
        'hashtags' => ['hashtag_id']
    ];

    public function hashtags($query)
    {
        return $query->hashtags();
    }

    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "$name%")->with($this->relations);
        });
    }
}
