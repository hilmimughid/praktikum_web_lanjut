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
        $this->call([KelasSeeder::class]);
        $this->call([MahasiswaSeeder::class]);
        $this->call([UpdateMahasiswaSeeder::class]);
        $this->call([MataKuliahSeeder::class]);
        $this->call([MahasiswaMatakuliahSeeder::class]);
    }
}
