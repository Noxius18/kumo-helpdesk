<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [
            'KT101',
            'KT102',
            'KT103'
        ];

        $kategori = [
            'Hardware',
            'Software',
            'Networking'
        ];

        foreach($id as $index => $kategori_id) {
            Kategori::create([
                'kategori_id' => $kategori_id,
                'kategori' => $kategori[$index]
            ]);
        }
    }
}
