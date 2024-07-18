<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const STATUS_PENDING = 'chờ xác nhận';
    const STATUS_PREPARING = 'đang chuẩn bị hàng';
    const STATUS_SHIPPING = 'giao hàng';
    const STATUS_COMPLETED = 'hoàn thành';
    const STATUS_CANCELLED = 'đã hủy';

    protected $fillable = ['name','email','address','phone','user_id', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
