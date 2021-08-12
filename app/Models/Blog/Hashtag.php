<?php

namespace App\Models\Blog;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Hashtag extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($hashtag) {
            $hashtag->slug = Str::slug($hashtag->name);
        });
    }


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
