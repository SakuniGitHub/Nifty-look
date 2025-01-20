<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = 'rents';
    protected $fillable = [
        'product_name',
        'category',
        'rent_price',
        'total_quantity',
        'available_quantity',
        'size',
        'color',
        'description',
        'product_image'
    ];
    protected $casts = [
        'rent_price' => 'decimal:2',
        'total_quantity' => 'integer',
        'available_quantity' => 'integer',
    ];
    // Automatically generate the reference number
    protected static function booted()
    {
        static::creating(function ($rent) {
            // Generate a unique reference number (e.g., RENT-0001)
            $lastRent = Rent::orderBy('id', 'desc')->first();
            $lastReferenceNumber = $lastRent ? $lastRent->reference_number : 'RENT-0000';

            $lastNumber = (int) substr($lastReferenceNumber, -4); // Extract last 4 digits
            $newReferenceNumber = 'RENT-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

            $rent->reference_number = $newReferenceNumber;
        });
    }
}
