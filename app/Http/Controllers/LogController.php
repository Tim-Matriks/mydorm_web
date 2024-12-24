<?php

namespace App\Http\Controllers;

use App\Models\Dormitizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\LogKeluarMasuk;
use App\Models\SeniorResident;
use App\Models\Helpdesk;
use Carbon\Carbon;

class LogController extends Controller
{
    private $ApiBaseURL = "http://localhost:3000/api";
    private $noGedung = "A01";

    public function index() {
        $getLogApi = "{$this->ApiBaseURL}/get-logs/{$this->noGedung}";

        try {
            $response = Http::get($getLogApi);

            if ($response->successful()) {
                $logsData = $response->json()['data'];
                return view('logskeluarmasuk.index', compact('logsData'));
            } else {
                return view('logskeluarmasuk.index')->with('error', 'Failed to fetch data from Node js API');
            }
        } catch (\Exception $e) {
            return view('logskeluarmasuk.index')->with('error', $e->getMessage());
        }
    }

    public function store(Request $request){
        $postLogAPI = "{$this->ApiBaseURL}/add-log";

        // for dias sebagai urusan autentikasi/akun
        // if pjPenerima = logged in as hd, helpdesk_id = pjPenerima_akun->helpdesk_id, senior_resident_id = null
        // else if pjPenerima = logged in as SR, senior_resident_id = pjPenerima_akun->senior_resident_id, helpdesk_id = null
        try {
            $response = Http::post($postLogAPI, [
                "waktu" => $request->waktu,
                "aktivitas" => $request->aktivitas,
                "status" => "diterima",
                "dormitizen_id" => $request->dormitizen_id,
                "senior_resident_id" => null, //ganti sesuai spesifikasi diatas
                "helpdesk_id" => "2", //ganti sesuai spesifikasi diatas
            ]);

            if ($response->successful()) {
                return redirect()->route('logskeluarmasuk.index')->with('success', 'Data log telah berhasil ditambahkan!');
            } else {
                return redirect()->route('logskeluarmasuk.create')->with('error', 'Gagal menambahkan log!');
            }
        } catch (\Exception $e) {
            return redirect()->route('logskeluarmasuk.create')->with('error', 'Gagal menghubungi API!');
        }
    }

    public function create(){
        return view('logskeluarmasuk.create');
    }

    public function edit($id){
        $getLogAPIbyID = "{$this->ApiBaseURL}/get-log/{$id}";
        try {
            $response = Http::get($getLogAPIbyID);
            if ($response->successful()) {
                $logData = $response->json()['data'][0];
                return view('logsKeluarMasuk.edit', compact('logData'));
            } else {
                return redirect()->route('logskeluarmasuk.index')->with('error', 'Failed to fetch data from node js!');
            }
        } catch (\Exception $e) {
            return redirect()->route('logskeluarmasuk.index')->with('error', 'Gagal menghubungi API.');
        }        
    }

    public function searchDormitizen(Request $request) {
        $nomorKamar = $request->input('nomor_kamar');

        // Validasi nomor kamar
        if (!$nomorKamar) {
            return redirect()->back()->with('error', 'Nomor kamar harus diisi.');
        }

        // API request ke endpoint yang relevan
        $getLogApi = "{$this->ApiBaseURL}/get-dormitizens/{$this->noGedung}/{$nomorKamar}";

        try {
            $response = Http::get($getLogApi);
            if ($response->ok()) {
                $dormitizens = $response->json()['data'];
                return redirect()->back()->with([
                'dormitizens' => $dormitizens,
                'nomorKamar' => $nomorKamar,
                ]);
            } else {
                return redirect()->back()->with('error', 'Tidak ada Dormitizen ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id) {
        $putLogAPI = "{$this->ApiBaseURL}/update-log/{$id}";
        try {
            $response = Http::put($putLogAPI, [
                "waktu" => $request->waktu,
                "aktivitas" => $request->aktivitas,
                "status" => $request->status,
                "dormitizen_id" => $request->dormitizen_id,
                "senior_resident_id" => null,
                "helpdesk_id" => "2",
            ]);
            if ($response->successful()) {
                return redirect()->route('logskeluarmasuk.index')->with('success', 'Data log telah berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengubah log!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghubungi API!');
        }
    }

    public function destroy($id)
    {
        $deleteLogApi = "{$this->ApiBaseURL}/delete-log/{$id}";

        try {
            $response = Http::delete($deleteLogApi);

            if ($response->successful()) {
                return redirect()->route('logskeluarmasuk.index')->with('success', 'log berhasil dihapus!');
            } else {
                return back()->with('error', 'Gagal menghapus log.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghubungi API.');
        }
    }
}
