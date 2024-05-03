<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jam;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\NamaDosen;
use App\Models\ProgramStudi;
use App\Models\Ruangan;
use App\Models\UserJadwalKuliah;
use App\Models\UserMatakuliah;

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
            [
                'name' => 'Angga T Yanuar',
                'username' => '1222625',
                'password' => bcrypt('123456'),
                'role' => 'mahasiswa'
            ],
            [
                'name' => 'Asiono Sidik',
                'username' => '1222626',
                'password' => bcrypt('123456'),
                'role' => 'mahasiswa'
            ],
            [
                'name' => 'Dedy Apriadi',
                'username' => '12226255',
                'password' => bcrypt('123456'),
                'role' => 'dosen'
            ],
            [
                'name' => 'Uro Abdurohim',
                'username' => '12226266',
                'password' => bcrypt('123456'),
                'role' => 'dosen'
            ],
            [
                'name' => 'Dani Pradana',
                'username' => '12226277',
                'password' => bcrypt('123456'),
                'role' => 'dosen'
            ],
            [
                'name' => 'Sandika Galih',
                'username' => '12226288',
                'password' => bcrypt('123456'),
                'role' => 'dosen'
            ],
        ];

        $hari = [
            [
                'name' => 'senin'

            ],
            [
                'name' => 'selasa'
            ],
            [
                
                'name' => 'rabu'
            ],
            [
                
                'name' => 'kamis'
            ],
            [
                'name' => 'jumat'
            ],
            [
                
                'name' => 'sabtu'
            ],
            [
                
                'name' => 'minggu'
            ],
            ];

            $jam = [
                [
                    'name' => '08:00-10:00'
                ],[
                    'name' => '10:00-12:00'
                ],[
                    'name' => '13:00-15:00'
                ],[
                    'name' => '15:00-17:00'
                ],
            ];

            $kelas = [
                [
                    'name' => 'Reguler'

                ],
                [
                    
                    'name' => 'Karyawan'
                ],
                [
                    
                    'name' => 'Eksekutif'
                ],
            ];
            $namaDosen = [
                [
                    'name' => 'Mina Ismu M.T'
                ],
                [
                    'name' => 'Dedy Apriadi M.T'
                ],
                [
                    'name' => 'Dani Pradana M.T'
                ],
                [
                    'name' => 'Uro Abdurohim M.T'
                ],
                [
                    'name' => 'Sandhika Galih M.T'
                ],
                ];
                $ruangan = [
                    [
                        'name' => 'Ruang 20',
                        'kapasitas' => 50
                    ],
                    [
                        'name' => 'Ruang 21',
                        'kapasitas' => 50
                    ],
                    [
                        'name' => 'Ruang 22',
                        'kapasitas' => 50
                    ],
                    [
                        'name' => 'Ruang 23',
                        'kapasitas' => 50
                    ],
                    [
                        'name' => 'Zoom (online)',
                        'kapasitas' => 50
                    ],
                    ];
                    $programStudi = [
                        [
                            'name' => 'Teknik Informatika'
                        ],
                        [
                            'name' => 'Sistem Informasi'
                        ],
                    ];
                    $matakuliah = [
                        [
                            'nama_dosen_id' => 1,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI01',
                            'name' => 'Pemrograman 1',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 1,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI02',
                            'name' => 'Mini Project 1',
                            'sks' => 3,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 1,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI03',
                            'name' => 'Algoritma',
                            'sks' => 3,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 1,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI01',
                            'name' => 'Pemgrograman 1',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 1,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI02',
                            'name' => 'Bhs Inggris',
                            'sks' => 3,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 2,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI04',
                            'name' => 'Matematika Dasar',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 2,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI06',
                            'name' => 'Kalkulus',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 2,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI03',
                            'name' => 'Matematika Dasar',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 2,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI04',
                            'name' => 'Kewirausahaan 1',
                            'sks' => 2,
                            'semester' => 1 
                        ],
                        [
                            'nama_dosen_id' => 3,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI07',
                            'name' => 'Pancasila',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 3,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI08',
                            'name' => 'Pemrograman 2',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 3,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI09',
                            'name' => 'Mini Project 2',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 3,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI05',
                            'name' => 'Pancasila',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 3,
                            'program_studi_id' => 2,
                            'kode_matakuliah' => 'SI06',
                            'name' => 'Mini Project 2',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 4,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI10',
                            'name' => 'Struktur Data',
                            'sks' => 3,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 4,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'TI11',
                            'name' => 'DBMS',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 4,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'SI07',
                            'name' => 'DBMS',
                            'sks' => 2,
                            'semester' => 2 
                        ],
                        [
                            'nama_dosen_id' => 5,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'SP001',
                            'name' => 'Laravel',
                            'sks' => 3,
                            'semester' => 3 
                        ],
                        [
                            'nama_dosen_id' => 5,
                            'program_studi_id' => 1,
                            'kode_matakuliah' => 'SP001',
                            'name' => 'React JS',
                            'sks' => 3,
                            'semester' => 3
                        ],
                    ];

                    $jadwal = [
                        [
                            'dosen_id' => 5,
                            'matakuliah_id' => 1,
                            'ruangan_id' => 1,
                            'hari_id' => 1,
                            'kelas_id' => 1,
                            'jam_id' => 1,
                        ],
                        [
                            'dosen_id' => 5,
                            'matakuliah_id' => 1,
                            'ruangan_id' => 2,
                            'hari_id' => 2,
                            'kelas_id' => 1,
                            'jam_id' => 2,
                        ],
                        [
                            'dosen_id' => 5,
                            'matakuliah_id' => 2,
                            'ruangan_id' => 1,
                            'hari_id' => 1,
                            'kelas_id' => 1,
                            'jam_id' => 2,
                        ],
                        [
                            'dosen_id' => 5,
                            'matakuliah_id' => 2,
                            'ruangan_id' => 2,
                            'hari_id' => 2,
                            'kelas_id' => 1,
                            'jam_id' => 1,
                        ],
                    ];
                    $userjadwal = 
                    [
                        [
                            'user_id' => 1,
                            'jadwal_kuliah_id' => 1
                        ],
                        [
                            'user_id' => 1,
                            'jadwal_kuliah_id' => 2
                        ],
                        [
                            'user_id' => 1,
                            'jadwal_kuliah_id' => 3  
                        ],
                        [
                            'user_id' => 1,
                            'jadwal_kuliah_id' => 4 
                        ],
                        [
                            'user_id' => 2,
                            'jadwal_kuliah_id' => 1
                        ],
                        [
                            'user_id' => 2,
                            'jadwal_kuliah_id' => 2
                        ],
                        [
                            'user_id' => 2,
                            'jadwal_kuliah_id' => 3  
                        ],
                        [
                            'user_id' => 2,
                            'jadwal_kuliah_id' => 4  
                        ]
                    ];
                    $usermatakuliah = 
                    [
                        [
                            'user_id' => 1,
                            'matakuliah_id' => 1
                        ],
                        [
                            'user_id' => 1,
                            'matakuliah_id' => 2
                        ],[
                            'user_id' => 1,
                            'matakuliah_id' => 3
                        ],[
                            'user_id' => 1,
                            'matakuliah_id' => 6
                        ],
                        [
                            'user_id' => 2,
                            'matakuliah_id' => 1
                        ],
                        [
                            'user_id' => 2,
                            'matakuliah_id' => 2
                        ],[
                            'user_id' => 2,
                            'matakuliah_id' => 3
                        ],[
                            'user_id' => 2,
                            'matakuliah_id' => 4
                        ],
                    ];

        foreach($userData as $key => $val)
        {
            User::create($val);
        }
        foreach($hari as $key => $val)
        {
            Hari::create($val);
        }
        foreach($kelas as $key => $val)
        {
            Kelas::create($val);
        }
        foreach($namaDosen as $key => $val)
        {
            NamaDosen::create($val);
        }
        foreach($ruangan as $key => $val)
        {
            Ruangan::create($val);
        }
        foreach($programStudi as $key => $val)
        {
            ProgramStudi::create($val);
        }
        foreach($matakuliah as $key => $val)
        {
            Matakuliah::create($val);
        }
        foreach($jam as $key => $val)
        {
            Jam::create($val);
        }
        foreach($jadwal as $key => $val)
        {
            JadwalKuliah::create($val);
        }
        foreach($userjadwal as $key => $val)
        {
            UserJadwalKuliah::create($val);
        }
        
    }
}
