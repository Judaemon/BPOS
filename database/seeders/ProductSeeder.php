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
        $statuses = ['available', 'out_of_stock', 'enabled', 'disabled'];

        $images = [
            'images/products/Diamond_Axe.webp',
            'images/products/Diamond_Hoe.webp',
            'images/products/Diamond_Pickaxe.webp',
            'images/products/Diamond_Shovel.webp',
            'images/products/Golden_Axe.webp',
            'images/products/Golden_Hoe.webp',
            'images/products/Golden_Pickaxe.webp',
            'images/products/Golden_Shovel.webp',
            'images/products/Iron_Axe.webp',
            'images/products/Iron_Hoe.webp',
            'images/products/Iron_Pickaxe.webp',
            'images/products/Iron_Shovel.webp',
            'images/products/Netherite_Axe.webp',
            'images/products/Netherite_Hoe.webp',
            'images/products/Netherite_Pickaxe.webp',
            'images/products/Netherite_Shovel.webp',
            'images/products/Stone_Axe.webp',
            'images/products/Stone_Hoe.webp',
            'images/products/Stone_Pickaxe.webp',
            'images/products/Stone_Shovel.webp',
            'images/products/Wooden_Axe.webp',
            'images/products/Wooden_Hoe.webp',
            'images/products/Wooden_Pickaxe.webp',
            'images/products/Wooden_Shovel.webp',
        ];

        foreach ($images as $i => $image) {
            Product::create([
                'name' => 'Product ' . ($i + 1),
                'image' => $image,
                'description' => 'Description of Product ' . ($i + 1),
                'stock' => rand(0, 100),
                'cost' => rand(50, 200),
                'price' => rand(100, 500),
                'status' => $statuses[rand(0, 3)],
            ]);
        }
    }
}
