<?php

namespace Packages\order\src\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'code',
        'is_percent',
        'amount',
        'expire_date',
        'use_time',
        'max_user',
    ];

    protected $casts = [
        'is_percent' => 'boolean',
        'expire_date' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearch($query , $keyword)
    {
        return $query->where('code' , 'LIKE' , "%{$keyword}%");
    }

}
