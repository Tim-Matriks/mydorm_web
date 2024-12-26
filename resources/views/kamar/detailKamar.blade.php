<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Paket</title>
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
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
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
                                    <td>{{ $dormitizen->nama }}</td>
                                    <td>{{ $dormitizen->nim }}</td>
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
