<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dormitizen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Box Icons for UI Elements -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <section id="content" class="container-fluid">
        <x-nav-bar>Dormitizen</x-nav-bar>

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
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Agama</th>
                                <th scope="col">No HP</th>
                                <th scope="col">No HP Orang Tua</th>
                                <th scope="col">Alamat Orang Tua</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dormitizen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="text-muted">Menampilkan data 1 sampai 9 dari 25 data</span>
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