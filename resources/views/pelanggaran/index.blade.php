<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggaran</title>
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
                <h1 class="h4 mb-0">Pelanggaran</h1>
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
                    <img src="../assets/images/avatar.jpg" alt="avatar" class="rounded-circle" width="40" height="40">
                </a>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <section id="main" class="container">
            <div class="paket-container">

                <!-- Search Bar dan Dropdown -->
                <div class="row mb-4 justify-content-end">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Cari disini">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected disabled>Urutkan</option>
                            <option value="1">Terbanyak</option>
                            <option value="2">Sedikit</option>
                        </select>
                    </div>
                </div>

                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Kamar</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Banyak Pelanggaran</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggarans as $pelanggaran)
                            <tr>
                                <td>{{ $pelanggaran->dormitizen->kamar->nomor ?? 'N/A' }}</td>
                                <td>{{ $pelanggaran->dormitizen->nama ?? 'N/A' }}</td>
                                <td>
                                    <div class="row">
                                        <div class="progress col-6">
                                            <div class=" progress progress-bar bg-danger" role="progressbar" style="width: <?php echo ($pelanggaran->total_pelanggaran / 9 * 100); ?>%" aria-valuenow="{{ $pelanggaran->total_pelanggaran /9*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="col-6">{{ $pelanggaran->total_pelanggaran }}/9</div>
                                    </div>

                                </td>
                                <td>
                                    <a href="/kamar/{{ $pelanggaran->dormitizen->kamar->kamar_id }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- Pagination -->
                {[ $pelanggarans->links:('pagination::bootstrap-5') ]}

            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>