<?php

namespace Database\Seeders;

use App\Models\Pemateri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemateri::create([
            'nama' => 'Naruto',
            'foto' => 'foto.png',
            'deskripsi' => 'Naruto adalah hokage ke7 di konoha',
        ]);

        Pemateri::create([
            'nama' => 'Sasuke',
            'foto' => 'foto.png',
            'deskripsi' => 'Sasuke adalah hokage ke7 di konoha',
        ]);

        Pemateri::create([
            'nama' => 'Kakashi',
            'foto' => 'foto.png',
            'deskripsi' => 'Kakashi adalah hokage ke7 di konoha',
        ]);

        Pemateri::create([
            'nama' => 'Itachi',
            'foto' => 'foto.png',
            'deskripsi' => 'Itachi adalah hokage ke7 di konoha',
        ]);
    }
}
