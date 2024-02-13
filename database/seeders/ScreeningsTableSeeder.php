<?php

namespace Database\Seeders;

use App\Models\Screening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Periksa Gula Darah Sewaktu',
                'description' => 'Pemeriksaan gula darah sewaktu'
            ],
            [
                'name' => 'Swab Test',
                'description' => 'Swab Test'
            ],
            [
                'name' => 'Rapid Test',
                'description' => 'Rapid Test'
            ]
        ];
        Screening::insert($datas);
    }
}
