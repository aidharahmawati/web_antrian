@extends('layouts.admin.app')

@section('content')

<div class="container-fluid">

    {{-- TITLE --}}
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">Selamat datang di sistem antrian rumah sakit</p>
    </div>

    {{-- CARD STATISTIK --}}
    <div class="row">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Poli</h6>
                        <h3 class="fw-bold">{{ $poli ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-hospital fa-2x text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Dokter</h6>
                        <h3 class="fw-bold">{{ $dokter ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-user-md fa-2x text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Total Pasien</h6>
                        <h3 class="fw-bold">{{ $pasien ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-user fa-2x text-warning"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h6 class="text-muted">Antrian Hari Ini</h6>
                        <h3 class="fw-bold">{{ $antrianHariIni ?? 0 }}</h3>
                    </div>
                    <i class="fas fa-list fa-2x text-danger"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE ANTRIAN TERBARU --}}
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Antrian Terbaru</h5>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($antrian ?? [] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama_pasien ?? '-' }}</td>
                        <td>{{ $item->poli->nama_poli ?? '-' }}</td>
                        <td>{{ $item->dokter->nama_dokter ?? '-' }}</td>
                        <td>
                            <span class="badge bg-success">{{ $item->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data antrian</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection