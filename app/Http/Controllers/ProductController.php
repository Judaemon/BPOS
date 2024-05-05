<?php

namespace App\Http\Controllers;

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

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $request->validated();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return to_route('product.index');
    }
}
