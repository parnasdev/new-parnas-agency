<?php


namespace Packages\pay\src\Models;


use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\pay\src\database\factories\TransactionFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
        'resnumber',
        'enter_port_at',
        'exit_port_at',
        'details',
        'status_id',
        'transactiontable_type',
        'transactiontable_id'
    ];

    protected $casts = [
        'details' => 'array'
    ];

    public function transactiontable()
    {
        $this->morphTo();
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeSearch($query , $keyword)
    {
        return $query->where('transactiontable_id' , "%$keyword%");
    }

    protected static function newFactory()
    {
        return TransactionFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
