<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $products = fn () => (
            Product::query()
            ->where('status', 'available')
            ->get()
        );

        return Inertia::render('Orders', [
            'products' => $products,
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'cost' => $request->cost,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return to_route('product.index');
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $request->validated();

        $imagePath = $request->file('image')->store('products', 'public');

        $product->update([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'cost' => $request->cost,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return to_route('product.index');
    }
}
