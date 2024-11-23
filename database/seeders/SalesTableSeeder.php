<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Log;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $months = 1; // Number of months of sales history

        // Fetch all products and users to associate with sales
        $products = Product::all();
        $users = User::all();

        for ($i = 0; $i < $months; $i++) {
            $salesPerMonth = random_int(10, 20);

            for ($j = 0; $j < $salesPerMonth; $j++) {
                DB::transaction(function () use ($faker, $products, $users, $i) {
                    $date = now()->subMonths($i);
                    $date = $date->setDay(random_int(1, $date->daysInMonth));
                    $seller = $users->random();
                    $paymentMethod = Arr::random(['cash']);
                    $accountNumber = Str::random(10); // Random account number or set as needed

                    $sale = Sale::create([
                        'seller_id' => $seller->id,
                        'total_amount' => 0, // Placeholder, will update later
                        'receipt_number' => "RN" . rand(100000, 999999),
                        'customer_name' => $faker->name,
                        'payment_method' => $paymentMethod,
                        'account_number' => $accountNumber,
                        'status' => Arr::random(['success']),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);

                    $totalAmount = 0;

                    $numberOfProducts = random_int(1, 3); // Random number of products per sale
                    foreach (range(1, $numberOfProducts) as $k) {
                        $product = $products->random(); // Randomly select a product
                        $quantity = random_int(1, 3); // Random quantity
                        $itemTotal = $product->price * $quantity;
                        $totalAmount += $itemTotal;

                        DB::table('sale_product')->insert([
                            'sale_id' => $sale->id,
                            'product_id' => $product->id,
                            'quantity' => $quantity,
                            'cost' => $product->cost,
                            'price' => $product->price,
                            'item_total' => $itemTotal,
                            'created_at' => $date,
                            'updated_at' => $date,
                        ]);
                    }

                    // Update total amount for the sale
                    $sale->update(['total_amount' => $totalAmount]);
                });
            }
        }
    }
}
