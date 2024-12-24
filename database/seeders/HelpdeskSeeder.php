<?php

namespace Database\Seeders;

use App\Models\Gedung;
use App\Models\Helpdesk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpdeskSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua gedung
        $gedungs = Gedung::all();
        $helpdeskData = [];
        $index = 0;
        $helpdesk = [
            ["nama" => "Agus Prasetyo Santoso", "nip" => "202401010101000001"],
            ["nama" => "Siti Kartika Putri", "nip" => "202401010102000002"],
            ["nama" => "Rizky Permadi Wijaya", "nip" => "202401010103000003"],
            ["nama" => "Dewi Anggraeni Sari", "nip" => "202401010104000004"],
            ["nama" => "Ahmad Saputra Ramadhan", "nip" => "202401010105000005"],
            ["nama" => "Fitri Wulandari Cahyani", "nip" => "202401010106000006"],
            ["nama" => "Dimas Aditya Hartono", "nip" => "202401010107000007"],
            ["nama" => "Ayu Melati Lestari", "nip" => "202401010108000008"]
        ];

        // Untuk setiap gedung, buat 4 helpdesk
        foreach ($gedungs as $gedung) {
            for ($i = 0; $i < 4; $i++){
                $helpdeskData[] = [
                    'nama' => $helpdesk[$index]['nama'],
                    'nip' => $helpdesk[$index]['nip'],
                    'gedung_id' => $gedung->gedung_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
    
                $index++;
            }   
        }

        DB::table('helpdesk')->insert($helpdeskData);
    }
}
