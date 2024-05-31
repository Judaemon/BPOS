<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        
        return Inertia::render('Sales', [
            'sales' => $sales,
        ]);
    }

    public function store(CreateSaleRequest $request)
    {
        $validatedData = $request->validated();

        try {
            \DB::beginTransaction();

            $sale = Sale::create([
                'seller_id' => auth()->id(),
                'total_amount' => $validatedData["total_amount"],
            ]);

            $products = [
                ['id' => 1, 'name' => 'Product 1'],
                ['id' => 2, 'name' => 'Product 2'],
                ['id' => 3, 'name' => 'Product 3'],
                // Add more products as needed
            ];
            
            $productIds = collect($products)->pluck('id');
            
            $products = Product::whereIn('id', $productIds)->get();
            //  ->decrement('quantity', 1);

            dd("test 1", $validatedData["products"]);
            $sale->products()->attach($validatedData["products"]);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
