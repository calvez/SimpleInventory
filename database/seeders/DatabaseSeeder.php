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
                DefaultUserSeeder::class,
                CountriesSeeder::class,
                AddressSeeder::class,
                TaxSeeder::class,
                PartnerCategorySeeder::class,
                PartnerSeeder::class,
                SupplierSeeder::class,
                ProductCategorySeeder::class,
                ProductSeeder::class,
                StorageCategorySeeder::class,
                StorageSeeder::class,
                TransactionCategorySeeder::class,
                TransactionSeeder::class,
                TransactionItemSeeder::class,
                ContactSeeder::class,
                UserSeeder::class,
            ]
        );
    }
}
