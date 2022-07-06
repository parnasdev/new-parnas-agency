<?php


namespace Packages\order\src\Models;


use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'post_id',
        'product_detail',
        'quantity',
        'price',
        'special_price',
        'total_price',
    ];

    protected $casts = [
        'product_detail' => 'array'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
