@extends('layouts.admin.app')

@section('title', 'Detail Dokter')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Detail Dokter</h3>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <strong>Nama Dokter:</strong>
                <p>{{ $dokter->nama_dokter }}</p>
            </div>

            <div class="mb-3">
                <strong>Spesialis:</strong>
                <p>{{ $dokter->spesialis }}</p>
            </div>

             <div class="mb-3">
                <strong>Poli:</strong>
                <p>{{ $dokter->poli->nama_poli ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <strong>Jumlah Antrian:</strong>
                <p>{{ $dokter->antrian->count() }}</p>
            </div>

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>

        <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning">
            Edit
        </a>
    </div>

</div>
@endsection