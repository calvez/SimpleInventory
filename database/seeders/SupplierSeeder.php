<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory()->count(1)->create();
        $s = Supplier::first();
        $s->addAddress(
            [
                'street' => 'Példa utca 123',
                'city' => 'Hamburg',
                'post_code' => '1110',
                'country' => 'DE', // ISO-3166-2 or ISO-3166-3 country code
                'is_primary' => true, // optional flag
            ]
        );
    }
}
