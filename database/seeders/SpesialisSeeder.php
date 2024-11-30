<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Spesialis;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [
            'SP101',
            'SP102',
            'SP103'
        ];

        $spesialis = [
            'Hardware',
            'Software',
            'Networking'
        ];

        foreach($id as $index => $spesialis_id) {
            Spesialis::create([
                'spesialis_id' => $spesialis_id,
                'spesialis' => $spesialis[$index]
            ]);
        }
    }
}
