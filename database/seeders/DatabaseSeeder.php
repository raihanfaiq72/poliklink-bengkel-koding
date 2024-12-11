<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Dokter::factory()->create([
            'nama_dokter' => 'Dr. John Doe',
            'alamat' => 'Jl. Raya No. 123, Jakarta',
            'no_hp' => '081234567890',
            'id_poli' => 1, // Contoh id_poli
            'username' => 'Ifan',
            'katasandi' => 'Semarang',
            'password' => bcrypt('Semarang'),
            'role' => 'dokter',
        ]);
    }
}
