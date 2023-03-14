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
        DB::table('hobi')->update([
            [
                'nama' => 'Afifah',
                'hobi' => 'Menggambar',
            ],
            [
                'nama' => 'Nofa',
                'hobi' => 'Bulu tangkis',
            ],
            [
                'nama' => 'Kurnia',
                'hobi' => 'Renang',
            ],
            [
                'nama' => 'Rahmadani',
                'hobi' => 'Makan',
            ]
            ]);
    }
}