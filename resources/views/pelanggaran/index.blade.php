<x-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    {{ $pelanggarans->links('pagination::bootstrap-5') }}
</x-layout>