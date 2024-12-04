<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Http\Requests\CreateSaleRequest;
use App\Models\Sale;
use App\Services\SaleReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    private $saleReportService;

    public function __construct(SaleReportService $saleReportService)
    {
        $this->saleReportService = $saleReportService;
    }

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
                'payment_received' => $validatedData["payment"],
                'receipt_number' => "RN" . rand(100000, 999999),
                'customer_name' => $validatedData["customer_name"],
                'payment_method' => $validatedData["payment_method"],
                'account_number' => $validatedData["account_number"] ?? null,
                'status' => 'success',
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

    public function export(Request $request)
    {
        try {
            $fileFormat = '.xlsx';
            $fileName = 'Sales_' . now()->format('YmdHis') . $fileFormat;

            return Excel::download(new SalesExport, $fileName);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function yearlyReport(Request $request)
    {
        try {
            $year = $request->input('year', now()->year);
            $yearlyReport = $this->saleReportService->yearlyReport($year);

            return $yearlyReport;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function monthlyReport(Request $request)
    {
        try {
            $year = $request->input('year', now()->year);
            $month = $request->input('month', now()->month);
            $monthlyReport = $this->saleReportService->monthlyReport($year, $month);

            return $monthlyReport;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
