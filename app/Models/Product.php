<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';


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
        'product_image'
    ];


    protected $casts = [
        'buy_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'stock_quantity' => 'integer',
    ];

    // Automatically generate the reference number
    protected static function booted()
    {
        static::creating(function ($product) {
            // Generate a unique reference number (e.g., PROD-0001)
            $lastProduct = Product::orderBy('id', 'desc')->first();
            $lastReferenceNumber = $lastProduct ? $lastProduct->reference_number : 'PROD-0000';

            $lastNumber = (int) substr($lastReferenceNumber, -4); // Extract last 4 digits
            $newReferenceNumber = 'PROD-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

            $product->reference_number = $newReferenceNumber;
        });
    }
}
