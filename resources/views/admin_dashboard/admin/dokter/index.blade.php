@extends('layouts.admin.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Data Dokter</h3>

            <a href="{{ route('dokter.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Dokter
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Poli</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokter as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_dokter }}</td>
                        <td>{{ $d->spesialis }}</td>
                        <td>{{ $d->poli->nama_poli ?? '-' }}</td>
                        <td>

                            {{-- DETAIL (optional kalau ada show) --}}
                            <a href="{{ route('dokter.show', $d->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('dokter.edit', $d->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('dokter.destroy', $d->id) }}" method="POST" class="d-inline">
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
                        <td colspan="5" class="text-center">Data dokter belum ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection