<x-layout>
    <h1 class="h3 mb-3">Detail Dormitizen pada gedung A01</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
        </div>
</x-layout>
