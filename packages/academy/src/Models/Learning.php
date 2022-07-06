<?php

namespace Packages\academy\src\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Packages\pay\src\Models\WithTransaction;

class Learning extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'expire',
        'post_id',
        'user_id',
        'season_unlock',
        'spot_license',
        'episode_logs',
    ];

    protected $casts = [
        'season_unlock' => 'array',
        'episode_logs' => 'array',
        'spot_license' => 'array',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
