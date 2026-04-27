@extends('layouts.admin.app')

@section('content')
<h3>Edit Antrian</h3>

<form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nomor Antrian</label>
        <input type="text" name="nomor_antrian" class="form-control"
               value="{{ $antrian->nomor_antrian }}">
    </div>

    <div class="mb-3">
        <label>Pasien</label>
         <input type="text" class="form-control"
       value="{{ $antrian->pasien->nama_pasien }}" readonly>

<input type="hidden" name="pasien_id" value="{{ $antrian->pasien_id }}">
           
    </div>

    <div class="mb-3">
        <label>Dokter</label>
        <select name="dokter_id" class="form-control">
            @foreach($dokter as $d)
                <option value="{{ $d->id }}"
                    {{ $antrian->dokter_id == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_dokter }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Poli</label>
        <select name="poli_id" class="form-control">
            @foreach($poli as $p)
                <option value="{{ $p->id }}"
                    {{ $antrian->poli_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_poli }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="dipanggil" {{ $antrian->status == 'dipanggil' ? 'selected' : '' }}>Dipanggil</option>
            <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('antrian.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection