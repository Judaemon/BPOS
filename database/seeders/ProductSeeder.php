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
        $statuses = ['available', 'out_of_stock', 'active', 'disabled'];
        
        // Generate 20 products for construction company
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => 'Product ' . ($i + 1),
                'description' => 'Description of Product ' . ($i + 1),
                'stock' => rand(0, 100),
                'cost' => rand(50, 200),
                'price' => rand(100, 500),
                'status' => $statuses[rand(0, 3)],
            ]);
        }
    }
}
