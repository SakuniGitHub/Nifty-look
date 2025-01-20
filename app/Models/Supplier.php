<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    
    protected $table = 'suppliers';

    
    protected $fillable = [
        'supplier_name',
        'company_name',
        'email',
        'phone_number',
        'address',
        'supplier_code'
    ];

    
}
