<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'admin',
                'username' => 'Admin',
                'alamat' => 'Jalan kemana aja ayok',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'petugas',
                'username' => 'petugas',
                'alamat' => 'Jalan kemana aja Kuy',
                'email' => 'petugas@gmail.com',
                'role' => 'petugas',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'pelanggan',
                'username' => 'petugas',
                'alamat' => 'Jalan kemana kesini',
                'email' => 'pelanggan@gmail.com',
                'role' => 'pelanggan',
                'password' => bcrypt('12345678'),
            ],
        ];
        foreach ($usersData as $key => $val) {
            User::create($val);
        }
    }
}
