<?php

namespace App\Models\Blog;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'id',
        'name',
        'description',
        'background_link'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if ($post->background_link !== null)
            {
                $filenameWithExt = $post->background_link->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $post->background_link->getClientOriginalExtension();
                $fileNameToStore = "backgrounds/" . $filename . "_" . time() . "." . $extension;
                $post->background_link->storeAs('public/', $fileNameToStore);
                $post->background_link = env('URL_FOR_FILES') . '/storage/' . $fileNameToStore;
            }
        });
    }


    public function hashtags(): BelongsToMany
    {
        return $this->belongsToMany(Hashtag::class)->withTimestamps();
    }
}
