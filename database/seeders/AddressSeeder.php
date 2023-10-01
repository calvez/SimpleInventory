<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = Partner::all();
        foreach ($partners as $key => $partner) {
            $partner->addAddress(
                [
                    'street' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'post_code' => fake()->postcode(),
                    'country' => fake()->countryCode(), // ISO-3166-2 or ISO-3166-3 country code
                    'is_primary' => true, // optional flag
                ]
            );
        }

        $suppliers = Supplier::all();
        foreach ($suppliers as $key => $supplier) {
            $supplier->addAddress(
                [
                    'street' => fake()->streetAddress(),
                    'city' => fake()->city(),
                    'post_code' => fake()->postcode(),
                    'country' => fake()->countryCode(), // ISO-3166-2 or ISO-3166-3 country code
                    'is_primary' => true, // optional flag
                ]
            );
        }
    }
}
