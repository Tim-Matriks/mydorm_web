<?php

namespace Database\Seeders;

use App\Models\Helpdesk;
use App\Models\Gedung;
use Illuminate\Database\Seeder;

class HelpdeskSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua gedung
        $gedungs = Gedung::all();

        // Untuk setiap gedung, buat 4 helpdesk
        foreach ($gedungs as $gedung) {
            Helpdesk::factory()->count(4)->create([
                'gedung_id' => $gedung->gedung_id,
            ]);
        }
    }
}
