<?php

namespace Packages\academy\src\Models;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use HasFactory, SoftDeletes , Sluggable , SluggableScopeHelpers;

    protected $fillable = [
        'name',
        'slug',
        'free',
        'post_id',
        'parent',
        'description',
    ];

    protected $casts = ['free' => 'boolean'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class , 'parent' , 'id');
    }

    public function episodes() {
        return $this->morphMany(Episode::class , 'episodetable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function scopeWithUniqueSlugConstraints(
        Builder $query,
        Model $model,
        string $attribute,
        array $config,
        string $slug
    ): Builder
    {
        $post = $model->post;
        return $query->where('post_id' , $post->getKey());
    }
}
