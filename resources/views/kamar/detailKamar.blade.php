<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Box Icons for UI Elements -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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


                <!-- Search Bar dan Dropdown -->
                <div class="row mb-4 justify-content-end">
                    <div class="col-md-1 mb-3 text-end">
                        <a href="./tambahPaket.html">
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
                <div class="container mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#dormitizen"
                                role="tab" aria-controls="dormitizen" aria-selected="true">Detail Penghuni</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Log Keluar Masuk</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Pelanggaran</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dormitizen" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Penghuni</th>
                                            <th>Program Studi</th>
                                            <th>Agama</th>
                                            <th>No HP Penghuni</th>
                                            <th>No HP Orang Tua</th>
                                            <th>Alamat Orang Tua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dormitizens as $dormitizen)
                                        <tr>
                                            <td>{{ $dormitizen->nim }}</td>
                                            <td>{{ $dormitizen->nama }}</td>
                                            <td>{{ $dormitizen->prodi }}</td>
                                            <td>{{ $dormitizen->agama }}</td>
                                            <td>{{ $dormitizen->no_hp }}</td>
                                            <td>{{ $dormitizen->no_hp_ortu }}</td>
                                            <td>{{ $dormitizen->alamat_ortu }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logsData as $logs)
                                        @foreach ($logs as $log)
                                        <tr class="text-center">
                                            <td>{{ $log->dormitizen->nama }}</td>
                                            <td>{{ $log->helpdesk_id ? $log->helpdesk->nama : $log->seniorResident->dormitizen->nama }}
                                            </td>
                                            <td>{{ $log->dormitizen->kamar->nomor }}</td>
                                            <td>{{ $log->waktu }}</td>
                                            <td>
                                                @if ($log->status == 'diterima')
                                                <span
                                                    class="text-success border border-3 rounded border-success p-1">{{ $log['status'] }}</span>
                                                @elseif ($log->status == 'pending')
                                                <span
                                                    class="text-warning border border-3 rounded border-warning p-1">{{ $log['status'] }}</span>
                                                @else
                                                <span
                                                    class="text-danger border border-3 rounded border-danger p-1">{{ $log['status'] }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($log->aktivitas == 'masuk')
                                                <span
                                                    class="border border-3 rounded border-primary p-1 text-primary">{{ $log['aktivitas'] }}</span>
                                                @else
                                                <span
                                                    class="border border-3 rounded border-danger p-1 text-danger">{{ $log['aktivitas'] }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            @for ($i = 0; $i < count($dormitizens); $i++)
                                <h2 class="mb-4">{{ $dormitizens[$i]->nama }}</h2>
                                @if (count($pelanggaransData[$i]) == 0)
                                <div class="alert alert-warning" role="alert">
                                    Tidak ada pelanggaran
                                </div>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Waktu</th>
                                                <th>Gambar</th>
                                                <th>Senior Resident</th>
                                                <th>Dormitizen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pelanggaransData[$i] as $pelanggaran)
                                            <tr>
                                                <td>{{ $pelanggaran->kategori }}</td>
                                                <td>{{ $pelanggaran->waktu }}</td>
                                                <td>
                                                    <img src="{{ asset('images/' . $pelanggaran->gambar) }}"
                                                        alt="Bukti Pelanggaran" width="100" height="100"
                                                        style="object-fit: cover;">
                                                </td>
                                                <td>{{ $pelanggaran->seniorResident->dormitizen->nama ?? 'N/A' }}
                                                </td>
                                                <td>{{ $pelanggaran->dormitizen->nama ?? 'N/A' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                                @endfor
                        </div>
                    </div>
                </div>



            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>