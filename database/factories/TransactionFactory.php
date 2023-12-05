<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'reference' => 'TRANS-' . date('Ymd') . '-' . Str::random(2),
            'storage_from' => 1,
            'storage_to' => 2,
            'type' => 'in',
            'note' => fake()->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
