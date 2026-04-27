@extends('layouts.admin.app')

@section('title', 'Detail Poli')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Detail Poli</h3>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <strong>Nama Poli:</strong>
                <p>{{ $poli->nama_poli }}</p>
            </div>

            <div class="mb-3">
                <strong>Keterangan:</strong>
                <p>{{ $poli->keterangan }}</p>
            </div>

            <div class="mb-3">
                <strong>Jumlah Dokter:</strong>
                <p>{{ $poli->dokter->count() }}</p>
            </div>

            <div class="mb-3">
                <strong>Jumlah Antrian:</strong>
                <p>{{ $poli->antrian->count() }}</p>
            </div>

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>

        <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-warning">
            Edit
        </a>
    </div>

</div>
@endsection