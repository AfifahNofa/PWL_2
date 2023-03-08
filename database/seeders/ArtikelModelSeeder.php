<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel')->insert([
            [
                'id' => 'A111',
                'judul' => 'Cara Membuat Artikel dengan AI',
                'penulis' => 'Sulthon Naufal',
                'tgl_publish' => '2023-03-01'
            ],
            [
                'id' => 'A112',
                'judul' => 'Ilmu itu lebih penting',
                'penulis' => 'Qeis hadi',
                'tgl_publish' => '2023-03-02'
            ],
            [
                'id' => 'A113',
                'judul' => 'Cara Membuat Artikel yang Baik',
                'penulis' => 'Naura Zahra',
                'tgl_publish' => '2023-03-03'
            ]
            ]);
    }
}