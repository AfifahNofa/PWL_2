<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
            [
                'kode' => 'P011',
                'nama' => 'Proyek 1',
                'dosen' => 'Rudy Ariyanto, ST., M.T',
                'sks' => '3',
            ],
            [
                'kode' => 'J013',
                'nama' => 'Jaringan Komputer',
                'dosen' => 'Kadek Suarjuna Batubulan, S.Kom, M.T',
                'sks' => '2',
            ],
            [
                'kode' => 'A023',
                'nama' => 'Analisis dan Desain Berorientasi Objek',
                'dosen' => 'Ariade Retno Ririd, S.Kom., M.Kom.',
                'sks' => '2',
            ],
            [
                'kode' => 'KW45',
                'nama' => 'Kewarganegaraan',
                'dosen' => 'Widaningsih Condrowardhani, SH, MH.',
                'sks' => '2',
            ],
            [
                'kode' => 'BI25',
                'nama' => 'Business Intelligence',
                'dosen' => 'Endah Septa Sintiya, SPd., MKom.',
                'sks' => '2',
            ],
            [
                'kode' => 'MP08',
                'nama' => 'Manajemen Proyek',
                'dosen' => 'Candra Bella Vista, S.Kom., MT.',
                'sks' => '2',
            ],
            [
                'kode' => 'PJ15',
                'nama' => 'Praktikum Jaringan Komputer',
                'dosen' => 'Kadek Suarjuna Batubulan, S.Kom, M.T',
                'sks' => '2',
            ],
            [
                'kode' => 'SK07',
                'nama' => 'Statistik Komputasi',
                'dosen' => 'Elok Nur Hamdana, S.T., MT.',
                'sks' => '2',
            ],
            [
                'kode' => 'PW34',
                'nama' => 'Pemrograman WEb Lanjut',
                'dosen' => 'Moch Zawaruddin Abdulah, S.ST., M.Kom',
                'sks' => '3',
            ]
            ]);
    }
}
