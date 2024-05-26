<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
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

            $sale->products()->attach($validatedData["products"]);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
