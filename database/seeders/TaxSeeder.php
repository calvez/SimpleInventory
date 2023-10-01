<?php

namespace Database\Seeders;

use App\Models\TaxGroup;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxGroup::factory()->count(10)->create();
    }
}
