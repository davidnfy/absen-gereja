<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cabang;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cabangs = [
            'Jakarta Pusat',
            'Bandung Utara',
            'Surabaya Barat',
            'Medan Timur',
            'Yogyakarta Selatan',
        ];

        foreach ($cabangs as $name) {
            Cabang::firstOrCreate(['name' => $name]);
        }
    }
}
