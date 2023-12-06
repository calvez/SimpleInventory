<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'message' => fake()->text(),
            'partner_category' => fake()->randomDigitNot(0),
            'bank_account' => fake()->bankAccountNumber(),
            'vat_number' => fake()->randomNumber(5, true),
            'eu_vat_number' => fake()->randomNumber(5, true),
        ];
    }

    public function attachAddress(): static
    {
        return $this->addAddress(
            [
                'street' => 'Példa utca 123',
                'city' => 'Budapest',
                'post_code' => '1110',
                'country' => 'HU', // ISO-3166-2 or ISO-3166-3 country code
                'is_primary' => true, // optional flag
            ]
        );
    }
}
