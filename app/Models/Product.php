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

    public function getFormattedPriceAttribute()
    {
        return Money::of($this->price, 'PHP')->formatTo('en_PH');
    }

    public function getFormattedTotalAttribute()
    {

        $totalAmount = $this->pivot->quantity * $this->price;
        return Money::of($totalAmount, 'PHP')->formatTo('en_PH');
    }
}