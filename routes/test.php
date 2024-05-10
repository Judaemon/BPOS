<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    // get authenticated user
    // $user = auth()->user()->permissions->pluck('name');
    // $user = auth()->user()->roles->pluck('name');

    $product = Product::all();

    return $product->toJson();
    dd($product);
});