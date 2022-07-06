<?php


namespace Packages\form\src\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $fillable = [
        'name',
        'inputs',
        'inboxes'
    ];

    protected $casts = [
        'inputs' => 'array',
        'inboxes' => 'array'
    ];

    public function scopeSearch($query , $keywords)
    {
        return $query->where('name' , 'LIKE' , "%$keywords");
    }

}
