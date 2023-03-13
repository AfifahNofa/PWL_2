<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobi')->insert([
            [
                'id' => 'B01',
                'nama' => 'Afifah',
                'hobi' => 'Menggambar',
            ],
            [
                'id' => 'B02',
                'nama' => 'Nofa',
                'hobi' => 'Bulu tangkis',
            ],
            [
                'id' => 'B03',
                'nama' => 'Kurnia',
                'hobi' => 'Renang',
            ],
            [
                'id' => 'B04',
                'nama' => 'Rahmadani',
                'hobi' => 'Makan',
            ]
            ]);
    }
}