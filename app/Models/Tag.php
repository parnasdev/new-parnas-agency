<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class ,'tag_post');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function (Tag $tag) { // before delete() method call this
            // do the rest of the cleanup...
            $tag->posts()->detach();
        });
    }

    public function scopeSearch($query, $keyword , $type)
    {
        return $query->where('type' , $type)->where("name", 'LIKE', '%'. $keyword .'%');
    }
}
