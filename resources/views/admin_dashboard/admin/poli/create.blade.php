@extends('layouts.admin.app')

@section('content')
<h3>Tambah Poli</h3>

<form action="{{ route('poli.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Poli</label>
        <input type="text" name="nama_poli" class="form-control">
    </div>

   <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection