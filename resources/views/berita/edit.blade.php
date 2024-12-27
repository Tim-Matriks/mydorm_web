<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Edit Berita</title>
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
                <h1 class="h4 mb-0">Edit Berita</h1>
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
        <div class="container mt-5">
            <h1>Edit Berita</h1>
            <form action="{{ route('berita.update', $berita) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Nama Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="Fasilitas asrama" {{ $berita->kategori == 'Fasilitas asrama' ? 'selected' : '' }}>Fasilitas asrama</option>
                        <option value="Kegiatan/Event asrama" {{ $berita->kategori == 'Kegiatan/Event asrama' ? 'selected' : '' }}>Kegiatan/Event asrama</option>
                        <option value="Tata tertib" {{ $berita->kategori == 'Tata tertib' ? 'selected' : '' }}>Tata tertib</option>
                        <option value="Info penting dari ditmawa" {{ $berita->kategori == 'Info penting dari ditmawa' ? 'selected' : '' }}>Info penting dari ditmawa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Detail</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ $berita->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="helpdesk_id" class="form-label">ID Helpdesk</label>
                    <select class="form-select" id="helpdesk_id" name="helpdesk_id" required>
                        <option value="">Pilih Helpdesk</option>
                        @foreach ($helpdesks as $helpdesk)
                        <option value="{{ $helpdesk->helpdesk_id }}">{{ $helpdesk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <!-- MAIN -->
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>