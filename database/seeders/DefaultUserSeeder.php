<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory()->create();

        $user = User::create(
            [
                'name' => 'Administrator',
                'email' => 'super.admin@test.com',
                'password' => Hash::make(12345678),
                'email_verified_at' => now(),
            ]
        );
    }
}
