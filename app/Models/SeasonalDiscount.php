<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonalDiscount extends Model
{
    use HasFactory;

    protected $table = 'seasonal_discounts';

    protected $fillable = [
        'discount_from',
        'discount_to',
        'discount_name',
        'discount_percentage',
    ];

    public $timestamps = true;
}
