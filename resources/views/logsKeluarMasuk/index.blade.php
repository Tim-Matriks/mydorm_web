<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Log Keluar Masuk</title>
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
                <h1 class="h4 mb-0">Logs Keluar-Masuk</h1>
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
                    <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="rounded-circle" width="40" height="40">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <section id="main" class="container">
            <div class="log-container">
                
                <!-- Search Bar dan Dropdown -->
                <div class="row mb-4 justify-content-end">
                    <!-- Button Tambah Log -->
                    <div class="col-md-1 mb-3 text-end">
                        <a href="{{ route('logskeluarmasuk.create') }}">
                            <button class="btn btn-danger ">+</button>
                        </a>
                    </div>
                    {{-- search --}}
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th scope="col">Nama Dormitizen</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col">Kamar</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aktivitas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logsData as $log)
                                <tr class="text-center">
                                    <td>{{ $log['nama_dormitizen'] }}</td>
                                    <td>{{ $log['nama_pj']}}</td>
                                    <td>{{ $log['nomor_kamar'] }}</td>
                                    <td>{{ $log['waktu'] }}</td>
                                    <td>
                                        @if ($log['status'] == 'diterima')
                                            <span class="text-success border border-3 rounded border-success p-1">{{ $log['status'] }}</span>
                                        @elseif ($log['status'] == 'pending')
                                            <span class="text-warning border border-3 rounded border-warning p-1">{{ $log['status'] }}</span>
                                        @else
                                            <span class="text-danger border border-3 rounded border-danger p-1">{{ $log['status'] }}</span>
                                        @endif
                                    </td>
                                    <td> 
                                        @if ($log['aktivitas'] == 'masuk')
                                            <span class="border border-3 rounded border-primary p-1 text-primary">{{ $log['aktivitas'] }}</span>
                                        @else
                                            <span class="border border-3 rounded border-danger p-1 text-danger">{{ $log['aktivitas'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('logskeluarmasuk.destroy', $log['log_keluar_masuk_id']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus log ini?')">delete</button>
                                        </form>
                                        <a href="{{ route('logskeluarmasuk.edit', $log['log_keluar_masuk_id']) }}">
                                            <button class="btn btn-warning ">edit</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="text-muted">Menampilkan data 1 sampai 8 dari 15 data</span>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item">
                                <button class="page-link prev-page">&lt;</button>
                            </li>
                            <li class="page-item disabled">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item">
                                <button class="page-link next-page">&gt;</button>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
