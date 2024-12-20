<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table = 'sale_product';
    
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'cost',
        'price',
        'item_total',
    ];
}
