<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    
    protected $table = 'wishlist';

    
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'category',
        'buy_price',
        'sell_price',
        'old_price',
        'stock_quantity',
        'size',
        'color',
        'description',
        'product_image',
        'date',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
