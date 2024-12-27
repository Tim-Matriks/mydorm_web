<?php

namespace Database\Seeders;

use App\Models\Gedung;
use App\Models\Helpdesk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HelpdeskSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua gedung
        $gedungs = Gedung::all();
        $helpdeskData = [];
        $index = 0;
        $helpdesk = [
            ["nama" => "Agus Prasetyo Santoso", "nip" => "202401010101000001", "username" => "agus", "password" => "12345"],
            ["nama" => "Siti Kartika Putri", "nip" => "202401010102000002", "username" => "siti", "password" => "12345"],
            ["nama" => "Rizky Permadi Wijaya", "nip" => "202401010103000003", "username" => "rizky", "password" => "12345"],
            ["nama" => "Dewi Anggraeni Sari", "nip" => "202401010104000004", "username" => "dewi", "password" => "12345"],
            ["nama" => "Ahmad Saputra Ramadhan", "nip" => "202401010105000005", "username" => "ahmad", "password" => "12345"],
            ["nama" => "Fitri Wulandari Cahyani", "nip" => "202401010106000006", "username" => "fitri", "password" => "12345"],
            ["nama" => "Dimas Aditya Hartono", "nip" => "202401010107000007", "username" => "dimas", "password" => "12345"],
            ["nama" => "Ayu Melati Lestari", "nip" => "202401010108000008", "username" => "ayu", "password" => "12345"]
        ];

        // Untuk setiap gedung, buat 4 helpdesk
        foreach ($gedungs as $gedung) {
            for ($i = 0; $i < 4; $i++) {
                $helpdeskData[] = [
                    'nama' => $helpdesk[$index]['nama'],
                    'nip' => $helpdesk[$index]['nip'],
                    'username' => $helpdesk[$index]['username'],
                    'password' => Hash::make($helpdesk[$index]['password']),
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
