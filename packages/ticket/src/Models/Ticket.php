<?php


namespace Packages\ticket\src\Models;


use App\Models\Extra\WithPostFile;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Ticket extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes , WithPostFile;

    protected $fillable = [
        'parent_id',
        'title',
        'user_id',
        'status_id',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(Ticket::class , 'parent_id' , 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
