<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Departemen;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [
            'DP101',
            'DP102',
            'DP103',
            'DP104',
            'DP105',
            'DP106'
        ];

        $nama = [
            'Audit',
            'Akuntansi',
            'Marketing',
            'IT',
            'HR',
            'Legal'
        ];

        foreach($id as $index => $departemen_id){
            Departemen::create([
                'departemen_id' => $departemen_id,
                'nama_departemen' => $nama[$index]
            ]);
        }
    }
}
