<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'id' => 'K1',
                'nama' => 'Anton',
                'ttl' => 'Malang, 08 Oktober 1978',
                'status' => 'Ayah',
                'agama' => 'Memancing',
            ],
            [
                'id' => 'K2',
                'nama' => 'Anis',
                'ttl' => 'Bandung, 19 februari 1980',
                'status' => 'Ibu',
                'agama' => 'Memasak',
            ],
            [
                'id' => 'K3',
                'nama' => 'Angela mika putri anton',
                'ttl' => 'Malang, 24 november 2002',
                'status' => 'Anak pertama',
                'agama' => 'Basket',
            ],
            [
                'id' => 'K4',
                'nama' => 'Angelo rafael putra anton ',
                'ttl' => 'Malang, 08 Oktober 2005',
                'status' => 'Anak kedua',
                'agama' => 'Sepak bola',
            ]
            ]);
    }
}
