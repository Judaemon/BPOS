<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Brick\Money\Money;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'total_amount',
        'receipt_number',
        'payment_method',
        'account_number'
    ];

    protected $cast = [
        'created_at' => 'datetime',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_product', 'sale_id', 'product_id')
        ->withPivot('quantity', 'cost', 'item_total')
            ->withTimestamps();
    }

    public function getFormattedTotalAmountAttribute()
    {
        return Money::of($this->total_amount, 'PHP')->formatTo('en_PH');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }
}
