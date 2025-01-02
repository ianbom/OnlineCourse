<?php

namespace Database\Seeders;

use App\Models\Bundle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bundle::create([
            'name_bundle' => 'Paket 1 Bulan',
            'price' => 50000,
            'duration' => 30,
            'description' => 'Ini paket 1 bulan aja'
        ]);

        Bundle::create([
            'name_bundle' => 'Paket 2 Bulan',
            'price' => 60000,
            'duration' => 60,
            'description' => 'Ini paket 2 bulan aja'
        ]);

        Bundle::create([
            'name_bundle' => 'Paket 3 Bulan',
            'price' => 80000,
            'duration' => 90,
            'description' => 'Ini paket 3 bulan aja'
        ]);
    }
}
