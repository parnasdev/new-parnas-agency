<?php

namespace Packages\academy\src\Models;

use App\Models\Extra\WithPostFile;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use HasFactory, SoftDeletes , WithPostFile;

    protected $fillable = [
        'number',
        'title',
        'description',
        'episodetable_id',
        'episodetable_type',
    ];

    protected $casts = [
        'spot_player' => 'array'
    ];

    public function episodetable()
    {
        return $this->morphTo()->withTrashed();
    }

}
