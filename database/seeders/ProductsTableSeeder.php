<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone X',
                'description' => 'Latest smartphone with advanced features',
                'price' => 799.99,
                'category_id' => 1, // Electronics
            ],
            [
                'name' => 'Laptop Pro',
                'description' => 'High-performance laptop for professionals',
                'price' => 1299.99,
                'category_id' => 1, // Electronics
            ],
            [
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling wireless headphones',
                'price' => 199.99,
                'category_id' => 1, // Electronics
            ],
            [
                'name' => 'Men\'s T-Shirt',
                'description' => 'Cotton t-shirt for men',
                'price' => 24.99,
                'category_id' => 2, // Clothing
            ],
            [
                'name' => 'Women\'s Jeans',
                'description' => 'Slim fit jeans for women',
                'price' => 49.99,
                'category_id' => 2, // Clothing
            ],
            [
                'name' => 'Coffee Maker',
                'description' => 'Automatic drip coffee maker',
                'price' => 59.99,
                'category_id' => 3, // Home & Kitchen
            ],
            [
                'name' => 'Blender',
                'description' => 'High-speed kitchen blender',
                'price' => 79.99,
                'category_id' => 3, // Home & Kitchen
            ],
            [
                'name' => 'Bestseller Novel',
                'description' => 'New York Times bestseller novel',
                'price' => 14.99,
                'category_id' => 4, // Books
            ],
            [
                'name' => 'Yoga Mat',
                'description' => 'Non-slip yoga mat',
                'price' => 29.99,
                'category_id' => 5, // Sports
            ],
            [
                'name' => 'Skincare Set',
                'description' => 'Complete skincare routine set',
                'price' => 89.99,
                'category_id' => 6, // Beauty
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
