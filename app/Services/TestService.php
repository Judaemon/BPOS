<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\User;
use Carbon\Carbon;
use Event;
use Illuminate\Support\Facades\DB;

class TestService
{
    public function test()
    {
        $this->generateSalesReport();

        // dd("test");

        // $test = DB::table('users')
        //     ->search('name', '.com')
        //     ->get();

        // $test = User::query()
        //     ->search(['name', "email"], 'em')
        //     ->get();

        // dd('test', $test->toArray());

        // $sales = Sale::query()
        //     ->with('seller')
        //     ->with('products')
        //     ->get();

        // dd($sales->toArray());
        // return $sales->toJson();
    }

    public function generateSalesReport()
    {
        // Fetch the report
        $monthly_report = Sale::select(
            DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
            DB::raw('SUM(sales.total_amount) as total_sales'),
            DB::raw('SUM(sale_product.quantity) as total_quantity'),
            DB::raw('SUM(sale_product.item_total) as total_revenue')
        )
        ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
        ->whereRaw('sales.created_at >= ?', [Carbon::now()->subMonths(6)->startOfMonth()])
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

        $yearly_report = Sale::select(
            DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
            DB::raw('SUM(sales.total_amount) as total_sales'),
            DB::raw('SUM(sale_product.quantity) as total_quantity'),
            DB::raw('SUM(sale_product.item_total) as total_revenue')
        )
        ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
        ->whereRaw('sales.created_at >= ?', [Carbon::now()->subMonths(6)->startOfMonth()])
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

        return [
            'current_report' => $monthly_report,
        ]; 
    }
}
