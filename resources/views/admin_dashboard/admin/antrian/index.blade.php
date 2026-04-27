@extends('layouts.admin.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Data Antrian</h3>

            {{-- kalau nanti mau tambah manual --}}
            {{-- <a href="{{ route('antrian.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Antrian
            </a> --}}
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nomor Antrian</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <th>Status</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($antrian as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item->nomor_antrian }}</strong></td>
                        <td>{{ $item->pasien->nama_pasien ?? '-' }}</td>
                        <td>{{ $item->dokter->nama_dokter ?? '-' }}</td>
                        <td>{{ $item->poli->nama_poli ?? '-' }}</td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>

                            {{-- DETAIL --}}
                            <a href="{{ route('antrian.show', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('antrian.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('antrian.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data antrian belum ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection