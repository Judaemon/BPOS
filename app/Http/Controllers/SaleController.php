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
        $sales = Sale::query()
            ->with(['seller', 'products'])
            ->get();

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
                'receipt_number' => "RN" . rand(100000, 999999),
                'customer_name' => $validatedData["customer_name"],
                'payment_method' => $validatedData["payment_method"],
                'account_number' => $validatedData["account_number"] ?? null,
            ]);

            $products = $validatedData["products"];

            foreach ($products as $product) {
                DB::table('products')->where('id', $product["product_id"])->decrement('stock', $product["quantity"]);
            }

            $sale->products()->attach($products);

            DB::commit();

            return redirect()->back()->with([
                'sale' => $sale,
                'message' => 'Sale created successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Failed to create sale: ' . $e->getMessage()]);
        }
    }

    public function pdf(Sale $sale, Request $request)
    {
        $sale = Sale::with('products')->findOrFail($sale->id);

        if ($request->has('preview')) {
            return view('pdf.receipt_sale', compact('sale'));
        }

        $pdf = \PDF::loadView('pdf.receipt_sale', compact('sale'));

        return $pdf->download("receipt_sale_{$sale->receipt_number}.pdf");
    }
}
