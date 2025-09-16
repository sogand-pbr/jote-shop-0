<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        // تولید ۲۰ محصول فیک
        Product::factory()->count(20)->create([
            'category_id' => $categories->random()->id,
        ]);
    }
}
