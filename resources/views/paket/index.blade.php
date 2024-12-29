<x-layout>
    <!-- Search Bar dan Dropdown -->
    <div class="row mb-4 justify-content-end">
        <div class="col-md-1 mb-3 text-end">
            <a href="{{ route('paket.create') }}">
                <button class="btn btn-danger ">+</button>
            </a>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Cari disini">
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected disabled>Urutkan</option>
                <option value="1">Hari ini</option>
                <option value="2">Terlama</option>
            </select>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="table-responsive" style="height: 70vh">
        <table class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">PJ Penerima</th>
                    <th scope="col">PJ Penyerahan</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Waktu Tiba</th>
                    <th scope="col">Waktu Diambil</th>
                    <th scope="col">Status Pengembalian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pakets as $paket)
                    @php
                        $datetimeT = $paket->waktu_tiba;
                        $parts = explode(' ', $datetimeT);
                        $tanggalT = $parts[0];
                        $waktuT = $parts[1];

                        $datetimeD = $paket->waktu_diambil;
                        if ($datetimeD) {
                            $parts = explode(' ', $datetimeD);
                            $tanggalD = $parts[0]; // Tanggal
                            $waktuD = $parts[1]; // Waktu
                        } else {
                            $tanggalD = '-';
                            $waktuD = ' ';
                        }
                    @endphp
                    <tr>
                        <td><img src="{{ asset($paket->gambar) }}" alt="Gmbr" width="50"></td>
                        <td>{{ $paket->dormitizen->nama }}</td>
                        <td>{{ $paket->penerimaPaket->nama }}</td>
                        <td>{{ $paket->penyerahan_paket }}</td>
                        <td>{{ $paket->dormitizen->kamar->nomor }}</td>
                        <td>{{ $tanggalT }}<br>{{ $waktuT }}</td>
                        <td>{{ $tanggalD }}<br>{{ $waktuD }}</td>
                        <td>
                            @if ($paket['status_pengambilan'] == 'sudah')
                                <span
                                    class="border rounded border-primary p-1 text-primary">{{ $paket['status_pengambilan'] }}</span>
                            @else
                                <span
                                    class="border rounded border-danger p-1 text-danger">{{ $paket['status_pengambilan'] }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('paket.destroy', $paket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus log ini?')"><i class="align-middle" data-feather="trash-2"></i> </button>
                            </form>
                            <a href="{{ route('paket.edit',$paket->paket_id) }}">
                                <button class="btn btn-warning "><i class="align-middle" data-feather="edit"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $pakets->links('pagination::bootstrap-5') }}

</x-layout>


{{-- <!DOCTYPE html>
<html lang="en"> --}}

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Paket</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Box Icons for UI Elements -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <section id="content" class="container-fluid">
        <!-- NAVBAR -->
        <nav
            class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-2"><i class="bx bx-menu"></i></button>
                <h1 class="h4 mb-0">Paket</h1>
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
                    <img src="../assets/images/avatar.jpg" alt="avatar" class="rounded-circle" width="40"
                        height="40">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <section id="main" class="container">
            <div class="paket-container">

                <!-- Button Tambah Paket -->



            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}
