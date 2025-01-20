<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'total_amount',
        'discount',
        'payment',
        'status',
        'shipping_address'
    ];

    public $timestamps = true;

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Automatically generate the reference number
    protected static function booted()
    {
        static::creating(function ($order) {
            // Generate a unique reference number (e.g., ORDER-0001)
            $order->reference_number = 'ORDER-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
