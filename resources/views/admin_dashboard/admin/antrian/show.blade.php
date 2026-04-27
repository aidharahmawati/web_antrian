@extends('layouts.admin.app')

@section('content')
<h3>Detail Antrian</h3>

<div class="card">
    <div class="card-body">

        <p><strong>Nomor Antrian:</strong> {{ $antrian->nomor_antrian }}</p>

        <p><strong>Nama Pasien:</strong>
            {{ $antrian->pasien->nama_pasien ?? '-' }}
        </p>

        <p><strong>Dokter:</strong>
            {{ $antrian->dokter->nama_dokter ?? '-' }}
        </p>

        <p><strong>Poli:</strong>
            {{ $antrian->poli->nama_poli ?? '-' }}
        </p>

        <p><strong>Status:</strong> {{ $antrian->status }}</p>

        <p><strong>Tanggal:</strong> {{ $antrian->tanggal }}</p>

        <a href="{{ route('antrian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection