<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()?->id,
            'name' => $this->faker->words(2, true),
            'slug' => Str::slug($this->faker->unique()->words(2, true) . '-' . time()),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'stock' => $this->faker->numberBetween(0, 30),
            'image' => null,
            'is_active' => true,
        ];
    }
}
