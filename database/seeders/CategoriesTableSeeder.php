<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Electronic devices and gadgets'],
            ['name' => 'Clothing', 'slug' => 'clothing', 'description' => 'Men, women and kids clothing'],
            ['name' => 'Home & Kitchen', 'slug' => 'home-kitchen', 'description' => 'Home appliances and kitchenware'],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'Fiction and non-fiction books'],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'Sports equipment and gear'],
            ['name' => 'Beauty', 'slug' => 'beauty', 'description' => 'Beauty and personal care products'],
            ['name' => 'Toys', 'slug' => 'toys', 'description' => 'Toys and games for kids'],
            ['name' => 'Furniture', 'slug' => 'furniture', 'description' => 'Home and office furniture'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
