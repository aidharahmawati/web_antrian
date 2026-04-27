@extends('layouts.admin.app')

@section('content')
<h3>Edit Poli</h3>

<form action="{{ route('poli.update', $poli->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Poli</label>
        <input type="text" name="nama_poli" value="{{ $poli->nama_poli }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ $poli->keterangan }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection