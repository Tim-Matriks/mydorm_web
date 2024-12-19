<?php

namespace Database\Seeders;

use App\Models\Dormitizen;
use App\Models\Kamar;
use Illuminate\Database\Seeder;

class DormitizenSeeder extends Seeder
{
    public function run(): void
    {
        // Mengisi data untuk Dormitizen Pria
        $kamarPria = Kamar::whereHas('gedung', function ($query) {
            $query->whereBetween('gedung_id', [1, 10]);  // Gedung pria
        })->get();

        foreach ($kamarPria as $kamar) {
            for ($i = 0; $i < 4; $i++) {
                $dormitizen = Dormitizen::factory()->create([
                    'kamar_id' => $kamar->kamar_id,  // Mengisi kamar_id di sini
                ]);
            }
        }

        // Mengisi data untuk Dormitizen Wanita
        $kamarWanita = Kamar::whereHas('gedung', function ($query) {
            $query->where('gedung_id', '>', 10);  // Gedung wanita
        })->get();

        foreach ($kamarWanita as $kamar) {
            for ($i = 0; $i < 4; $i++) {
                $dormitizen = Dormitizen::factory()->dormitizenWanita()->create([
                    'kamar_id' => $kamar->kamar_id,  // Mengisi kamar_id di sini
                ]);
            }
        }
    }
}


