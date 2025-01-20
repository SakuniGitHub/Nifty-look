<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

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
        'quantity',
        'checkout'
    ];


    public $timestamps = true;


}
