<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => 'U101',
            'nama' => 'Admin',
            'email' => 'admin@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => null,
            'role_id' => 'RL001',
            'departemen_id' => 'DP104'
        ]);

        User::create([
            'user_id' => 'U102',
            'nama' => 'Teknisi Kierkeegard',
            'email' => 'teknisi@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => 'SP102',
            'role_id' => 'RL002',
            'departemen_id' => 'DP104'
        ]);

        User::create([
            'user_id' => 'U103',
            'nama' => 'Karyawan',
            'email' => 'karyawan@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => null,
            'role_id' => 'RL003',
            'departemen_id' => 'DP105'
        ]);
    }
}
