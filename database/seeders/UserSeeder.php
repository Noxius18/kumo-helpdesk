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
            'nama' => 'Niccolo Machiavelli',
            'email' => 'niccolo@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => null,
            'role_id' => 'RL001',
            'departemen_id' => 'DP104'
        ]);

        User::create([
            'user_id' => 'U102',
            'nama' => 'Soren Kierkeegard',
            'email' => 'soren@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => 'SP102',
            'role_id' => 'RL002',
            'departemen_id' => 'DP104'
        ]);

        User::create([
            'user_id' => 'U103',
            'nama' => 'Immanuel Kant',
            'email' => 'kant@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => null,
            'role_id' => 'RL003',
            'departemen_id' => 'DP105'
        ]);

        User::create([
            'user_id' => 'U104',
            'nama' => 'Kasane Teto',
            'email' => 'teto@kumomail.dev',
            'password' => bcrypt('password'),
            'spesialis_id' => null,
            'role_id' => 'RL003',
            'departemen_id' => 'DP103'
        ]);
    }
}
