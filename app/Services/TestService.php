<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;
use Event;
use Illuminate\Support\Facades\DB;

class TestService
{
    public function test()
    {
        $this->generateSalesReport();

        dd("test");

        $test = DB::table('users')
            ->search('name', '.com')
            ->get();

        $test = User::query()
            ->search(['name', "email"], 'em')
            ->get();

        dd('test', $test->toArray());

        $sales = Sale::query()
            ->with('seller')
            ->with('products')
            ->get();

        dd($sales->toArray());
        return $sales->toJson();
    }

    // public function generateSalesReport()
    // {
    //     // Get the current month
    //     $currentMonth = now()->format('Y-m');

    //     // Fetch the report
    //     $report = Sale::select(
    //         DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
    //         DB::raw('SUM(sales.total_amount) as total_sales'),
    //         DB::raw('SUM(sale_product.quantity) as total_quantity'),
    //         DB::raw('SUM(sale_product.item_total) as total_revenue')
    //     )
    //         ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
    //         ->groupBy('month')
    //         ->orderBy('month', 'asc')
    //         ->get();

    //     // Calculate month-over-month differences and percentage changes
    //     $salesDifferences = [];
    //     $percentageChanges = [];
    //     $previousSales = null;

    //     foreach ($report as $data) {
    //         if ($previousSales !== null) {
    //             $salesDifferences[] = $data->total_sales - $previousSales;
    //             $percentageChange = ($data->total_sales - $previousSales) / $previousSales * 100;
    //             $percentageChanges[] = $percentageChange;
    //         }
    //         $previousSales = $data->total_sales;
    //     }

    //     // Calculate the average difference and average percentage change
    //     $averageDifference = count($salesDifferences) ? array_sum($salesDifferences) / count($salesDifferences) : 0;
    //     $averagePercentageChange = count($percentageChanges) ? array_sum($percentageChanges) / count($percentageChanges) : 0;

    //     // Generate predictions for the next 3 months
    //     $predictions = [];
    //     $lastSales = $report->last()->total_sales ?? 0;

    //     for ($i = 1; $i <= 3; $i++) {
    //         $nextMonth = now()->addMonths($i)->format('Y-m');

    //         // Predict sales for the next month
    //         $predictedSales = max(0, $lastSales + $averageDifference * $i); // Ensure no negative sales
    //         $predictedQuantity = round($predictedSales / 20, 2); // Adjust as needed

    //         // Calculate predicted revenue based on average percentage change
    //         $predictedRevenue = round($predictedSales * (1 + ($averagePercentageChange / 100)), 2); // Use the average percentage change

    //         $predictions[] = [
    //             'month' => $nextMonth,
    //             'predicted_sales' => round($predictedSales, 2),
    //             'predicted_quantity' => $predictedQuantity,
    //             'predicted_revenue' => $predictedRevenue,
    //         ];
    //     }

    //     dd($report->toArray(), $predictions);

    //     // return [
    //     //     'current_report' => $report,
    //     //     'predictions' => $predictions,
    //     // ]; 

    //     return response()->json([
    //         'current_report' => $report,
    //         'predictions' => $predictions,
    //     ]);
    // }

    public function generateSalesReport()
    {
        // Get the current month in 'Y-m' format
        $currentMonth = now()->format('Y-m');

        // Fetch the sales report data
        $report = Sale::select(
            DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
            DB::raw('SUM(sales.total_amount) as total_sales'),
            DB::raw('SUM(sale_product.quantity) as total_quantity'),
            DB::raw('SUM(sale_product.item_total) as total_revenue')
        )
            ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Calculate month-over-month differences and percentage changes
        $salesDifferences = [];
        $percentageChanges = [];
        $previousSales = null;

        foreach ($report as $data) {
            if ($previousSales !== null) {
                $salesDifferences[] = $data->total_sales - $previousSales;
                $percentageChanges[] = ($data->total_sales - $previousSales) / $previousSales * 100;
            }
            $previousSales = $data->total_sales;
        }

        // Calculate the average difference and percentage change
        $averageDifference = count($salesDifferences) ? array_sum($salesDifferences) / count($salesDifferences) : 0;
        $averagePercentageChange = count($percentageChanges) ? array_sum($percentageChanges) / count($percentageChanges) : 0;

        // Generate predictions for the next 3 months
        $predictions = [];
        $lastSales = $report->last()->total_sales ?? 0;

        for ($i = 1; $i <= 5; $i++) {
            $nextMonth = now()->addMonths($i)->format('Y-m');
            $predictedSales = max(0, $lastSales + $averageDifference * $i);
            $predictedQuantity = round($predictedSales / 1000, 2);
            $predictedRevenue = round($predictedSales * (($averagePercentageChange / 100)), 2);

            // Add the human-readable month for the predictions
            $predictions[] = [
                'month' => now()->addMonths($i)->format('F Y'), // Human-readable month
                'predicted_sales' => round($predictedSales, 2),
                'predicted_quantity' => $predictedQuantity,
                'predicted_revenue' => $predictedRevenue,
            ];
        }

        // Make 'month' field in report human-readable as well
        $report = $report->map(function ($data) {
            $data->month = \Carbon\Carbon::createFromFormat('Y-m', $data->month)->format('F Y');
            return $data;
        });

        // dd($report->toArray(), $predictions);

        return [
            'current_report' => $report,
            'predictions' => $predictions,
        ]; 

        // Return the response with the report and predictions
        // return response()->json([
        //     'current_report' => $report,
        //     'predictions' => $predictions,
        // ]);
    }
}
