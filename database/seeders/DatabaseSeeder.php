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

        $userData = [
            [
                'name' => 'Fan Fan Firgiawan',
                'username' => '1222624',
                'password' => bcrypt('123456'),
                'role' => 'mahasiswa'
            ],
            [
                'name' => 'Mina Ismu',
                'username' => '12226244',
                'password' => bcrypt('123456'),
                'role' => 'dosen'
            ],[
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
        ];
        foreach($userData as $key => $val)
        {
            User::create($val);
        }
    }
}
