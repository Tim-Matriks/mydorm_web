<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Log Keluar Masuk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Box Icons for UI Elements -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <section id="content" class="container-fluid">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-2"><i class="bx bx-menu"></i></button>
                <h1 class="h4 mb-0">Tambah Log Keluar-Masuk</h1>
            </div>
            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-light position-relative me-3">
                    <i class="bx bxs-bell fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        8
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <a href="#" class="profile">
                    <img src="{{ asset('images/avatar.jpg') }}" class="rounded-circle" width="40" height="40">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <section id="main" class="container">
            <div class="tambah-log-container">
                <form action="{{ route('logskeluarmasuk.searchDormitizen') }}" method="GET" class="mb-3">
                    @csrf 
                    <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                    @if(session('dormitizens'))
                        <div class="input-group">
                            <input type="number" name="nomor_kamar" class="form-control" placeholder={{ session('dormitizens')[0]['nomor_kamar'] }} required>
                            <button type="submit" class="btn btn-primary">Cari Dormitizen</button>
                        </div>
                    @else
                        <div class="input-group">
                            <input type="number" name="nomor_kamar" class="form-control" placeholder="Masukkan nomor kamar" required>
                            <button type="submit" class="btn btn-primary">Cari Dormitizen</button>
                        </div>
                    @endif
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
                            <label for="pjPenerima" class="form-label">PJ Penerima</label>
                            <input type="text", name="pjPenerima", class="form-control", value="Ganep Kacung Mandala" disabled>
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
            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
