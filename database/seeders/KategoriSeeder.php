<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['kategori' => 'Bahan Jadi']);
        Kategori::create(['kategori' => 'Bahan Baku']);
        Kategori::create(['kategori' => 'Sparepart']);
        Kategori::create(['kategori' => 'Sampel']);
    }
}
