<?php

namespace Database\Seeders;

use App\Models\Storage as Raktar;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Storage::factory()->count(5)->create();

        $data = [
            'Veszprém',
            'Szombathely',
            'Tatabánya',
            'Erdély',
        ];

        foreach ($data as $key => $d) {
            $storage = Raktar::create(
                [
                    'name' => $d,
                    'created_at' => now(),
                ]
            );
            $storage->addAddress(
                [
                    'street' => 'Példa utca 123',
                    'city' => $d,
                    'post_code' => '1110',
                    'country' => 'HU', // ISO-3166-2 or ISO-3166-3 country code
                    'is_primary' => true, // optional flag
                ]
            );
        }
    }
}
