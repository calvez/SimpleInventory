<?php

namespace Database\Seeders;

use App\Models\StorageCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StorageCategory::factory()->count(5)->create();
    }
}
