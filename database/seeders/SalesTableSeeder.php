<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;
use Str;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $months = 5; // Number of months of sales history
        $salesPerMonth = 20; // Number of sales per month

        // Fetch all products and users to associate with sales
        $products = Product::all();
        $users = User::all();

        for ($i = 0; $i < $months; $i++) {
            $date = now()->subMonths($i);

            for ($j = 0; $j < $salesPerMonth; $j++) {
                $seller = $users->random(); // Randomly select a seller
                $totalAmount = random_int(100, 5000); // Random total amount
                $paymentMethod = 'Cash'; // Adjust this as needed
                $accountNumber = Str::random(10); // Random account number or set as needed

                // Create the sale
                $saleId = DB::table('sales')->insertGetId([
                    'seller_id' => $seller->id,
                    'total_amount' => $totalAmount,
                    'receipt_number' => Str::random(10),
                    'payment_method' => $paymentMethod,
                    'account_number' => $accountNumber,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);

                // Create sale products for this sale
                $numberOfProducts = random_int(1, 5); // Random number of products per sale

                for ($k = 0; $k < $numberOfProducts; $k++) {
                    $product = $products->random(); // Randomly select a product
                    $quantity = random_int(1, 3); // Random quantity

                    DB::table('sale_product')->insert([
                        'sale_id' => $saleId,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'cost' => $product->cost,
                        'item_total' => $product->cost * $quantity,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }
            }
        }
    }
}
