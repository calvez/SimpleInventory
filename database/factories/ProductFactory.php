<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->name(),
            'sku' => fake()->randomNumber(5, true),
            'unit' => 'db',
            'description' => fake()->text(),
            'message' => fake()->text(),
            'net_amount' => fake()->randomNumber(5, true),
            'gross_amount' => fake()->randomNumber(5, true),
            'product_category_id' => fake()->randomDigitNotNull(),
            'tax_id' => fake()->randomDigitNot(0),
            'min_store' => fake()->randomDigitNot(0),
            'barcode' => fake()->randomNumber(5, true),
            'vtsz' => fake()->randomNumber(5, true),
        ];
    }
}
