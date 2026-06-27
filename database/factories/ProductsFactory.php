<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Categories::inRandomOrder()->first()->id,
            'nama_produk' => fake()->words(2, true),
            'kode_produk' => 'PRD-' . fake()->unique()->numerify('#####'),
            'harga' => fake()->numberBetween(5000, 500000),
            'stok' => fake()->numberBetween(0, 200),
            'gambar' => null,
        ];
    }
}
