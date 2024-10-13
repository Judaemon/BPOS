<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'cost',
        'price',
        'stock',
        'status'
    ];

    public function getTotalAttribute()
    {
        return  $this->pivot->quantity * $this->price;
    }
}