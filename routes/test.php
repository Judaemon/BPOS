<?php

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    // get authenticated user
    // $user = auth()->user()->permissions->pluck('name');
    // $user = auth()->user()->roles->pluck('name');

    // $product = Product::all();

    // return $product->toJson();
    // dd($product);

    $sales = Sale::query()
        ->with('seller')
        ->with('products')
        ->get();

    dd($sales->toArray());
});