<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gedungData = [
            //GD asrama putra
            ['kode' => 'A01', 'nama' => 'Laag'],
            ['kode' => 'A02', 'nama' => 'Larat'],
            ['kode' => 'A03', 'nama' => 'Leti'],
            ['kode' => 'A04', 'nama' => 'Liki'],
            ['kode' => 'A05', 'nama' => 'Lingian'],
            ['kode' => 'A06', 'nama' => 'Liran'],
            ['kode' => 'A07', 'nama' => 'Sambit'],
            ['kode' => 'A08', 'nama' => 'Sebetul'],
            ['kode' => 'A09', 'nama' => 'Sekatung'],
            ['kode' => 'A10', 'nama' => 'Sekel'],

            // GD asrama putri
            ['kode' => 'B01', 'nama' => 'Dana'],
            ['kode' => 'B02', 'nama' => 'Dona'],
            ['kode' => 'B03', 'nama' => 'Enggano'],
            ['kode' => 'B04', 'nama' => 'Enu'],
            ['kode' => 'B05', 'nama' => 'Fani'],
            ['kode' => 'B06', 'nama' => 'Fanildo'],
            ['kode' => 'A11', 'nama' => 'Sebelas'],
            ['kode' => 'A12', 'nama' => 'Duabelas'],
        ];

        DB::table('gedung')->insert($gedungData);
    }
}

