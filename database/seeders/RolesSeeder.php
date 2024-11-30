<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [
            'RL001',
            'RL002',
            'RL003'
        ];

        $role = [
            'Admin',
            'Teknisi',
            'Karyawan'
        ];

        foreach($id as $index => $role_id){
            Role::create([
                'role_id' => $role_id,
                'role' => $role[$index]
            ]);
        }
    }
}
