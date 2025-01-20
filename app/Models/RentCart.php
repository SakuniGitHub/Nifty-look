<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCart extends Model
{
    use HasFactory;

    protected $table = 'rents_cart';

    protected $fillable = [
        'user_id',
        'rent_id',
        'product_name',
        'category',
        'rent_price',
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
