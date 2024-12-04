<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SaleReportService
{
    public function getAllReports()
    {
        $yearlyReport = $this->yearlyReport(2024);

        return [
            'yearly' => $yearlyReport,
        ];
    }

    public function yearlyReport(int $year)
    {
        try {
            $yearlyReport = Sale::select(
                DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
                DB::raw('SUM(sales.total_amount) as total_sales'),
                DB::raw('SUM(sale_product.quantity) as total_quantity'),
                DB::raw('SUM(sale_product.item_total) as total_revenue')
            )
                ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
                ->where('sales.created_at', '>=', Carbon::parse("$year-01-01"))
                ->where('sales.created_at', '<=', Carbon::parse("$year-12-31"))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            return $yearlyReport;
        } catch (\Exception $e) {
            // Log the error and return an empty collection or error message
            \Log::error('Error generating yearly report: ' . $e->getMessage());
            return collect();
        }
    }

    public function monthlyReport(int $year, int $month)
    {
        try {
            $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

            $monthlyReport = Sale::select(
                DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m-%d") as day'),
                DB::raw('SUM(sales.total_amount) as total_sales'),
                DB::raw('SUM(sale_product.quantity) as total_quantity'),
                DB::raw('SUM(sale_product.item_total) as total_revenue')
            )
                ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
                ->where('sales.created_at', '>=', $startOfMonth)
                ->where('sales.created_at', '<=', $endOfMonth)
                ->groupBy('day')
                ->orderBy('day', 'asc')
                ->get();

            return $monthlyReport;
        } catch (\Exception $e) {
            // Log the error and return an empty collection or error message
            \Log::error('Error generating monthly report: ' . $e->getMessage());
            return collect();
        }
    }
}
