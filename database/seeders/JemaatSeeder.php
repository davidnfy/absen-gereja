<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jemaat;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jemaatData = [
            [
                'nik' => '1234567890123456',
                'nama_lengkap' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-15',
                'jenis_kelamin' => 'Laki-laki',
                'cabang' => 'Jakarta Pusat',
            ],
            [
                'nik' => '1234567890123457',
                'nama_lengkap' => 'Jane Smith',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1985-05-20',
                'jenis_kelamin' => 'Perempuan',
                'cabang' => 'Bandung Utara',
            ],
            [
                'nik' => '1234567890123458',
                'nama_lengkap' => 'Bob Johnson',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1992-08-10',
                'jenis_kelamin' => 'Laki-laki',
                'cabang' => 'Surabaya Barat',
            ],
            [
                'nik' => '1234567890123459',
                'nama_lengkap' => 'Alice Wilson',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1988-12-03',
                'jenis_kelamin' => 'Perempuan',
                'cabang' => 'Medan Timur',
            ],
            [
                'nik' => '1234567890123460',
                'nama_lengkap' => 'Charlie Brown',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1995-03-25',
                'jenis_kelamin' => 'Laki-laki',
                'cabang' => 'Yogyakarta Selatan',
            ],
        ];

        foreach ($jemaatData as $data) {
            Jemaat::create($data);
        }
    }
}
