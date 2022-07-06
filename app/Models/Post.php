<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Packages\academy\src\Models\HasAcademy;
use App\Models\Extra\{WithComment, WithPostFile, WithVisit};
use Cviebrock\EloquentSluggable\{Sluggable, SluggableScopeHelpers};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable, SluggableScopeHelpers, WithVisit, WithComment, WithPostFile, HasAcademy;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'body',
        'options',
        'pin',
        'comment',
        'post_type',
        'status_id',
        'lang'
    ];


    protected $casts = [
        'pin' => 'boolean',
        'comment' => 'boolean',
        'options' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'پنهان شده',
            'family' => ''
        ]);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function path()
    {
        $lang = session()->has('lang') ? session('lang') : app()->getLocale();
        if ($this->post_type == 'post') {
            return route('posts.show', ['post' => $this->slug , "lang" => "$lang"]);
        }

        if ($this->post_type == 'academy') {
            return route('courses.show', ['course' => $this->slug , "lang" => "$lang"]);
        }

        if ($this->post_type == 'page') {
            return url("/{$this->slug}");
        }
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) { // before delete() method call this
            if ($post->isForceDeleting()) {
                $post->files()->delete();
                $post->categories()->detach();
                $post->tags()->detach();
                if (function_exists('seasons')) {
                    $post->seasons()->delete();
                }
                if (function_exists('episodes')) {
                    $post->episodes()->delete();
                }

                if (function_exists('learnings')) {
                    $post->learnings()->delete();
                }
            }
            // do the rest of the cleanup...
        });
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where("title", 'LIKE', '%'. $keyword .'%');
    }

    public function scopeWithUniqueSlugConstraints(
        Builder $query,
        Model   $model,
        string  $attribute,
        array   $config,
        string  $slug
    ): Builder
    {
        return $query->where('post_type', isset($config['type']) ? $config['type'] : $model->post_type);
    }
}
