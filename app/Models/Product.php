<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price','sale', 'category_id','img','quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    // public function reviews()
    // {
    //     return $this->hasMany(Command::class, 'product_id');
    // }
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
