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
        // Get the current month
        $currentMonth = now()->format('Y-m');

        // Fetch the report
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
                $percentageChange = ($data->total_sales - $previousSales) / $previousSales * 100;
                $percentageChanges[] = $percentageChange;
            }
            $previousSales = $data->total_sales;
        }

        // Calculate the average difference and average percentage change
        $averageDifference = count($salesDifferences) ? array_sum($salesDifferences) / count($salesDifferences) : 0;
        $averagePercentageChange = count($percentageChanges) ? array_sum($percentageChanges) / count($percentageChanges) : 0;
        // dd($report->toArray(), $salesDifferences, $percentageChanges);

        $predictions = $this->predictNextMonths($report->toArray());

        // dd($report->toArray(), $predictions);
        // // Generate predictions for the next 3 months
        // $predictions = [];
        // $lastSales = $report->last()->total_sales ?? 0;
        // // $minimumQuantity = 
        // for ($i = 1; $i <= 5; $i++) {
        //     $nextMonth = now()->addMonths($i)->format('Y-m');
        //     $predictedSales = max(0, $lastSales + $averageDifference * $i);
        //     $predictedQuantity = rand();
        //     $predictedRevenue = round($predictedSales * (($averagePercentageChange / 100)), 2);

        //     // Add the human-readable month for the predictions
        //     $predictions[] = [
        //         'month' => now()->addMonths($i)->format('F Y'), // Human-readable month
        //         'predicted_sales' => round($predictedSales, 2),
        //         'predicted_quantity' => $predictedQuantity,
        //         'predicted_revenue' => $predictedRevenue,
        //     ];
        // }

        // Make 'month' field in report human-readable as well
        // $report = $report->map(function ($data) {
        //     $data->month = \Carbon\Carbon::createFromFormat('Y-m', $data->month)->format('F Y');
        //     return $data;
        // });

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

    // public function generateSalesReport()
    // {
    //     $test = SaleProduct::query()
    //         ->select(
    //             DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
    //             DB::raw("SUM(cost * quantity) as total_cost"),
    //             DB::raw("SUM(price * quantity) as total_price")
    //         )
    //         ->groupBy('month')
    //         ->orderBy('month', 'asc')
    //         ->get();

    //     // dd($test->toArray());
    //     // Fetch the sales report data
    //     // $report = Sale::query()
    //     // ->select([
    //     //     'sales.*',
    //     //     // DB::raw('DATE_FORMAT(sales.created_at, "%Y-%m") as month'),
    //     //     // DB::raw('SUM(sales.total_amount) as total_sales'),
    //     //     // DB::raw('SUM(sale_product.quantity * sale_product.cost) as total_cost'),
    //     // ])
    //     // // ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id')
    //     // ->with('products')
    //     // // ->groupBy('month')
    //     // // ->orderBy('month', 'asc')
    //     // ->limit(10)
    //     // ->get();

    //     $report = Sale::query()
    // ->selectRaw('sales.*, SUM(sale_product.cost * sale_product.quantity) as total_cost')
    // ->join('sale_product', 'sales.id', '=', 'sale_product.sale_id') // Join pivot table
    // ->groupBy('sales.id') // Group by sales to calculate the total for each sale
    // ->with('products') // Eager load products if needed
    // ->limit(10)
    // ->get();

    //     dd($report->toArray());
    //     // Calculate month-over-month differences and percentage changes
    //     $salesDifferences = [];
    //     $percentageChanges = [];
    //     $previousSales = null;

    //     foreach ($report as $data) {
    //         if ($previousSales !== null) {
    //             $salesDifferences[] = $data->total_sales - $previousSales;
    //             $percentageChanges[] = ($data->total_sales - $previousSales) / $previousSales * 100;
    //         }
    //         $previousSales = $data->total_sales;
    //     }

    //     // Calculate the average difference and percentage change
    //     $averageDifference = count($salesDifferences) ? array_sum($salesDifferences) / count($salesDifferences) : 0;
    //     $averagePercentageChange = count($percentageChanges) ? array_sum($percentageChanges) / count($percentageChanges) : 0;

    //     // Generate predictions for the next 3 months
    //     $predictions = [];
    //     $lastSales = $report->last()->total_sales ?? 0;

    //     for ($i = 1; $i <= 5; $i++) {
    //         $nextMonth = now()->addMonths($i)->format('Y-m');
    //         $predictedSales = max(0, $lastSales + $averageDifference * $i);
    //         $predictedQuantity = round($predictedSales / 1000, 2);
    //         $predictedRevenue = round($predictedSales * (($averagePercentageChange / 100)), 2);

    //         // Add the human-readable month for the predictions
    //         $predictions[] = [
    //             'month' => now()->addMonths($i)->format('F Y'), // Human-readable month
    //             'predicted_sales' => round($predictedSales, 2),
    //             'predicted_quantity' => $predictedQuantity,
    //             'predicted_revenue' => $predictedRevenue,
    //         ];
    //     }

    //     // Make 'month' field in report human-readable as well
    //     $report = $report->map(function ($data) {
    //         $data->month = Carbon::createFromFormat('Y-m', $data->month)->format('F Y');
    //         return $data;
    //     });

    //     // dd($report->toArray(), $predictions);

    //     return [
    //         'current_report' => $report,
    //         'predictions' => $predictions,
    //     ];

    //     // Return the response with the report and predictions
    //     // return response()->json([
    //     //     'current_report' => $report,
    //     //     'predictions' => $predictions,
    //     // ]);
    // }

    public function predictNextMonths($data, $monthsToPredict = 5)
    {
        // Initialize variables
        $totalSalesGrowth = [];
        $totalQuantityGrowth = [];
        $totalRevenueGrowth = [];
        
        // Calculate growth rates
        for ($i = 1; $i < count($data); $i++) {
            $prev = $data[$i - 1];
            $current = $data[$i];
            
            $totalSalesGrowth[] = ($current['total_sales'] - $prev['total_sales']) / $prev['total_sales'];
            $totalQuantityGrowth[] = ($current['total_quantity'] - $prev['total_quantity']) / $prev['total_quantity'];
            $totalRevenueGrowth[] = ($current['total_revenue'] - $prev['total_revenue']) / $prev['total_revenue'];
        }

        // Calculate average growth rates
        $avgSalesGrowth = array_sum($totalSalesGrowth) / count($totalSalesGrowth);
        $avgQuantityGrowth = array_sum($totalQuantityGrowth) / count($totalQuantityGrowth);
        $avgRevenueGrowth = array_sum($totalRevenueGrowth) / count($totalRevenueGrowth);

        // Get the last known month and values
        $lastData = end($data);
        $lastMonth = new \DateTime($lastData['month']);
        $currentSales = $lastData['total_sales'];
        $currentQuantity = $lastData['total_quantity'];
        $currentRevenue = $lastData['total_revenue'];

        // Predict future data
        $predictions = [];
        for ($i = 0; $i < $monthsToPredict; $i++) {
            $lastMonth->modify('+1 month');
            $currentSales *= (1 + $avgSalesGrowth);
            $currentQuantity *= (1 + $avgQuantityGrowth);
            $currentRevenue *= (1 + $avgRevenueGrowth);

            $predictions[] = [
                'month' => $lastMonth->format('Y-m'),
                'predicted_sales' => round($currentSales, 2),
                'predicted_quantity' => round($currentQuantity),
                'predicted_revenue' => round($currentRevenue, 2),
            ];
        }

        return $predictions;
    }
}
