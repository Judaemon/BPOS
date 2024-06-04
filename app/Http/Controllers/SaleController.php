<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            DB::beginTransaction();

            $sale = Sale::create([
                'seller_id' => auth()->id(),
                'total_amount' => $validatedData["total_amount"],
                'receipt_number' => "rn".rand(100000, 999999),
            ]);

            $products = $validatedData["products"];
            
            foreach ($products as $product) {
                DB::table('products')->where('id', $product["product_id"])->decrement('stock', $product["quantity"]);
            }

            $sale->products()->attach($validatedData["products"]);

            DB::commit();
            
            return redirect()->route('sales.index')->with('success', 'Sale created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
