<x-layout>
    @if (session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @elseif (session('error')) 
        <div class="alert alert-danger">{{ session('error') }}</div> 
    @endif
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
            <form action="{{ route('logskeluarmasuk.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari disini">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form action="{{ route('logskeluarmasuk.index') }}" method="GET">
                <div class="input-group">
                    <select class="form-select" name="filter_sort" onchange="this.form.submit()">
                        <option selected disabled>Urutkan</option>
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </form>
            
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
                        <td>{{ $log->Dormitizen->nama }}</td>
                        <td>{{ $log->Helpdesk->nama}}</td>
                        <td>{{ $log->Dormitizen->Kamar->nomor }}</td>
                        <td>{{ \Carbon\Carbon::parse($log['waktu'])->format('H:i - d/m/Y') }}</td>
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
    {{ $logsData->links('pagination::bootstrap-5') }}

</x-layout>