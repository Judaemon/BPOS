<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render('Products', [
            'products' => $products,
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $validatedData = $request->validated();

        $imagePath = $request->file('image')->store('products', 'public');
        $imagePath = "storage/$imagePath";

        Product::create([
            'name' => $validatedData['name'],
            'image' => $imagePath,
            'description' => $validatedData['description'],
            'cost' => $validatedData['cost'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'status' => $validatedData['status'],
        ]);

        return to_route('product.index');
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $imagePath = "storage/$imagePath";
        }

        $product->update([
            'name' => $request->name,
            'image' => $imagePath ?? $product->image,
            'description' => $request->description,
            'cost' => $request->cost,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return to_route('product.index');
    }
}
