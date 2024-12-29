<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket</title>
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
                <h1 class="h4 mb-0">Tambah Paket</h1>
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
            <div class="tambah-paket-container">

                <!-- Form untuk menambah paket -->
                <form action="{{ route('paket.update',$paket->paket_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-container mb-3">
                        @if ($paket)
                            <!-- Menampilkan Nama Dormitizen dan Nomor Kamar -->
                            <div class="kamar-container mb-3">
                                <label class="form-label">Nomor Kamar</label>
                                <div id="dormitizen-kamar" class="mt-1">
                                    <input type="text" class="form-control" value="{{ $paket->dormitizen->kamar->nomor }}" readonly>
                                </div>
                            </div>
                            <div class="nama-container mb-3">
                                <label for="dormitizen" class="form-label">Nama Dormitizen</label>
                                <div id="dormitizen-nama" class="mt-1">
                                    <input type="text" class="form-control" value="{{ $paket->dormitizen->nama }}" readonly>
                                </div>
                            </div>
                        @endif

                        <!-- Penyerah Paket -->
                        <div class="pjPenerima-container mb-3">
                            <label for="pjPenyerah" class="form-label">Penyerah Paket</label>
                            <input type="text" name="penyerahan_paket" class="form-control" value="{{ auth()->user()->helpdesk_id }}" hidden>
                            <input type="text" name="pjPenyerah" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                        </div>

                        <!-- Waktu Diambil -->
                        <div class="waktu-container mb-3">
                            <label for="waktu_diambil" class="form-label">Waktu Diambil</label>
                            <input type="datetime-local" class="form-control" name="waktu_diambil" required>
                        </div>

                        <!-- Status Pengambilan -->
                        <div class="status-container mb-3">
                            <label for="status_pengambilan" class="form-label">Status Pengambilan</label>
                            <select name="status_pengambilan" class="form-select" required>
                                <option value="belum">Belum</option>
                                <option value="sudah">Sudah</option>
                            </select>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="btn-simpan">
                            <button type="submit" class="btn btn-danger">Simpan</button>
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
