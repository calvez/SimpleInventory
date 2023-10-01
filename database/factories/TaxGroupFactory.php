<?php

namespace Database\Factories;

use App\Models\TaxGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxGroup>
 */
class TaxGroupFactory extends Factory
{
    protected $model = TaxGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'value' => fake()->randomDigitNotNull(),
        ];
    }
}
