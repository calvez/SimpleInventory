<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = Partner::all();
        foreach ($partners as $key => $partner) {
            $partner->addContact(
                [
                    'first_name' => fake()->firstNameMale(),
                    'last_name' => fake()->lastName(),
                    'website' => fake()->domainName(),
                    'phone' => fake()->phoneNumber(),
                    'mobile' => fake()->phoneNumber(),
                    'email' => fake()->email(),
                    'email_invoice' => fake()->safeEmail(),
                    'is_primary' => true, // optional flag
                ]
            );
        }

        $suppliers = Supplier::all();
        foreach ($suppliers as $key => $supplier) {
            $supplier->addContact(
                [
                    'first_name' => fake()->firstNameMale(),
                    'last_name' => fake()->lastName(),
                    'website' => fake()->domainName(),
                    'phone' => fake()->phoneNumber(),
                    'mobile' => fake()->phoneNumber(),
                    'email' => fake()->email(),
                    'email_invoice' => fake()->safeEmail(),
                    'is_primary' => true, // optional flag
                ]
            );
        }
    }
}
