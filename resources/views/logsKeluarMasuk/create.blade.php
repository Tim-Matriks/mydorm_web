<x-layout>
    @if (session('error')) 
        <div class="alert alert-danger">{{ session('error') }}</div> 
    @endif
    <form action="{{ route('logskeluarmasuk.searchDormitizen') }}" method="GET" class="mb-3">
        @csrf 
        <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
            <div class="input-group">
                @if(session('dormitizens'))
                    <input type="number" name="nomor_kamar" class="form-control" placeholder={{ session('dormitizens')[0]['nomor_kamar'] }} required>
                @else
                    <input type="number" name="nomor_kamar" class="form-control" placeholder="Masukkan nomor kamar" required>
                @endif
                <button type="submit" class="btn btn-secondary">Cari Dormitizen</button>
            </div>
    </form>
    

    <form action="{{ route('logskeluarmasuk.store') }}" method="POST">
        @csrf
        <div class="input-container mb-3">
            @if(session('dormitizens'))
            <div class="nama-container mb-3">
                <label for="" class="form-label">Nama Dormitizen</label>
                    <div id="dormitizen-list" class="mt-3">
                    @if(count(session('dormitizens')) > 0)
                        <select id="dormitizen-select" name="dormitizen_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Dormitizen</option>
                            @foreach(session('dormitizens') as $dormitizen)
                                <option value="{{ $dormitizen['dormitizen_id'] }}">{{ $dormitizen['nama'] }}</option>
                            @endforeach
                        </select>
                    @else
                        <p class="text-danger">Tidak ada Dormitizen ditemukan.</p>
                    @endif
                </div>
            </div>
            @endif
            <div class="pjPenerima-container mb-3">
                {{-- {{ dd(auth()->user) }} --}}
                <label for="pjPenerima" class="form-label">PJ Penerima</label>
                <input type="text", class="form-control", value="{{ auth()->user()->nama }}" disabled>
                <input type="text", name="pjPenerima", class="form-control", value="{{ auth()->user()->helpdesk_id }}" hidden>
            </div>
            <div class="waktu-container mb-3">
                <label for="waktu" class="form-label">Waktu Penerima</label>
                <input type="datetime-local", class="form-control", name="waktu">
            </div>
            <div class="aktivitas-container mb-3">
                <label for="" class="form-label">Aktivitas</label>
                <div class="pilihan-aktivitas">
                    <input type="radio" id="aktivitas-masuk" name="aktivitas" value="Masuk" class="form-check-input">
                    <label for="aktivitas-masuk" class="form-check-label">Masuk</label><br>
                </div>
                <div class="pilihan-aktivitas">
                    <input type="radio" id="aktivitas-keluar" name="aktivitas" value="Keluar" class="form-check-input">
                    <label for="aktivitas-keluar" class="form-check-label">Keluar</label><br>
                </div>
            </div>
            <div class="btn-simpan">
                <button class="btn btn-danger">Simpan</button>
            </div>
        </div>
    </form>       
</x-layout>
