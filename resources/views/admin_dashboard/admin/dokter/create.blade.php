@extends('layouts.admin.app')
@section('title', 'Tambah Dokter')

@section('content')
    <div class="pt-2 pb-3">
        <h3 class="fw-bold">Tambah Dokter</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" name="nama_dokter" value="{{ old('nama_dokter') }}" class="form-control @error('nama_dokter') is-invalid @enderror"  placeholder="Masukkan nama dokter">
                        @error('nama_dokter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <input type="text" name="spesialis" value="{{ old('spesialis') }}" class="form-control @error('spesialis') is-invalid @enderror" placeholder="Masukkan spesialis">
                        @error('spesialis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" form-group mb-3">
                        <label for="poli_id" class="form-label">Poli</label>
                        <select name="poli_id" class="form-control @error('poli_id') is-invalid @enderror">
                            <option value="">Pilih Poli</option>
                            @foreach($poli as $item)
                                <option value="{{ $item->id }}" {{ old('poli_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_poli }}</option>
                            @endforeach
                        </select>
                        @error('poli_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"><span class="fa fa-plus">Simpan</span></button>

                    <a href="{{ route('dokter.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
    
