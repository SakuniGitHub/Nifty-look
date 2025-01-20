<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productst extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'productst';  // Table name is 'productst' (plural)

    // Specify the primary key column (if it's not 'id')
    protected $primaryKey = 'id';  // Default primary key is 'id'

    // Allow mass assignment for specific columns
    protected $fillable = [
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
    ];

    // Cast columns to specific types (optional)
    protected $casts = [
        'buy_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];
}
