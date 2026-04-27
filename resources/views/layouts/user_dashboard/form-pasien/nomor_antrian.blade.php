@extends('layouts.app')

@section('title', 'Nomor Antrian')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- CARD NOMOR ANTRIAN --}}
            <div class="card shadow-lg border-0 text-center">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">SISTEM ANTRIAN RUMAH SAKIT</h5>
                </div>

                <div class="card-body p-5">

                    {{-- NOMOR BESAR --}}
                    <h1 class="display-1 fw-bold text-primary">
                        {{ $antrian->nomor_antrian }}
                    </h1>

                    <p class="text-muted mb-4">Nomor Antrian Anda</p>

                    <hr>

                    {{-- INFO PASIEN --}}
                    <div class="text-start">

                        <p><strong>Nama Pasien:</strong> {{ $antrian->pasien->nama_pasien }}</p>

                        <p><strong>Poli:</strong> {{ $antrian->poli->nama_poli }}</p>

                        <p><strong>Dokter:</strong> {{ $antrian->dokter->nama_dokter }}</p>

                        <p>
                            <strong>Status:</strong>
                            <span class="badge bg-warning text-dark">
                                {{ $antrian->status }}
                            </span>
                        </p>

                        <p><strong>Tanggal:</strong> {{ $antrian->tanggal }}</p>

                    </div>

                    <hr>

                    {{-- PESAN --}}
                    <p class="text-muted">
                        Silakan menunggu panggilan sesuai nomor antrian Anda
                    </p>

                </div>

                {{-- FOOTER --}}
                <div class="card-footer bg-light">

                    <button onclick="window.print()" class="btn btn-success">
                        <i class="fas fa-print"></i> Cetak
                    </button>

                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection