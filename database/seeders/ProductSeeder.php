<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 20 products for construction company
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => 'Product ' . ($i + 1),
                'description' => 'Description of Product ' . ($i + 1),
                'cost' => rand(50, 200), // Random cost between 50 and 100
                'price' => rand(100, 500), // Random price between 100 and 150
            ]);
        }
    }
}
