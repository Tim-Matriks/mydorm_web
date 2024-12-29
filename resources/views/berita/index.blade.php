<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Berita</title>
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
                <h1 class="h4 mb-0">Berita</h1>
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
            <div class="berita-container">

                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Search Bar dan Dropdown -->
                <div class="row mb-4 justify-content-end">
                    <div class="col-md-1 mb-3 text-end">
                        <a href="{{ route('berita.create') }}">
                            <button class="btn btn-danger">+</button>
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
                                <th scope="col">No</th>
                                <th scope="col">Nama Berita</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Nama Helpdesk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- $iteration = 1; -->
                            @foreach ($beritas as $berita)
                            <tr>
                                <td>{{ $loop->iteration + ($beritas->currentPage() - 1) * $beritas->perPage() }}</td> <!-- Buat looping nomor urut -->
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->kategori }}</td>
                                <td>{{ $berita->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('berita.show', $berita) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('berita.destroy', $berita) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                                <td>{{ $berita->helpdesk->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{ $beritas->links('pagination::bootstrap-5') }}

            </div>
        </section>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>