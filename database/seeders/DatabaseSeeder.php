<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        User::create([
            'name' => 'Fan Fan',
            'username' => 'admin',
            'password' => bcrypt('123456')
        ]);
        Mahasiswa::create([
            'name' => 'Firgiawan',
            'nim' => '1222624',
            'password' => bcrypt('123456')
        ]);
        Dosen::create([
            'name' => 'Sandhika',
            'nidn' => '12226244',
            'password' => bcrypt('123456')
        ]);
        
    }
}
