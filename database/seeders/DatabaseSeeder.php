<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                PartnerCategorySeeder::class,
                PartnerSeeder::class,
                ProductCategorySeeder::class,
                ProductSeeder::class,
                StorageCategorySeeder::class,
                StorageSeeder::class,
                TransactionCategorySeeder::class,
                TransactionSeeder::class,
            ]
        );
    }
}
