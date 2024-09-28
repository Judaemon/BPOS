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
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(filename: public_path('images/' . $product->image));
            }
    
            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            // Keep the existing image if no new image is uploaded
            $validatedData['image'] = $product->image;
        }

        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'cost' => $validatedData['cost'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'status' => $validatedData['status'],
            'image' => $validatedData['image'],
        ]);

        return to_route('product.index');
    }
}
