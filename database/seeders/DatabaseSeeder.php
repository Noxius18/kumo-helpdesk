<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DepartemenSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(UserSeeder::class);
    }
}
