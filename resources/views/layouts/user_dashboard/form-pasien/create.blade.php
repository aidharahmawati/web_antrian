
@extends('layouts.app')


@section('title', 'Form Antrian')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body p-5">
                    <h3 class="text-center fw-bold mb-5">Form Antrian</h3>

                    <form method="POST" action="{{ route('form-pasien.store') }}">
                        @csrf

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama_pasien" 
                                   class="form-control @error('nama_pasien') is-invalid @enderror"
                                   value="{{ old('nama_pasien') }}">

                            @error('nama_pasien')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" 
                                   class="form-control @error('alamat') is-invalid @enderror"
                                   value="{{ old('alamat') }}">

                            @error('alamat')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Telepon --}}
                        <div class="form-group mb-3">
                            <label>Telepon</label>
                            <input type="text" name="telp" 
                                   class="form-control @error('telp') is-invalid @enderror"
                                   value="{{ old('telp') }}">

                            @error('telp')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Poli --}}
                        <div class="form-group mb-3">
                            <label>Poli</label>
                            <select name="poli_id" 
                                    class="form-control @error('poli_id') is-invalid @enderror">
                                <option value="">-- Pilih Poli --</option>
                                @foreach($poli as $p)
                                    <option value="{{ $p->id }}" {{ old('poli_id') == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_poli }}
                                    </option>
                                @endforeach
                            </select>

                            @error('poli_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Dokter --}}
                        <div class="form-group mb-4">
                            <label>Dokter</label>
                            <select name="dokter_id" 
                                    class="form-control @error('dokter_id') is-invalid @enderror">
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokter as $d)
                                    <option value="{{ $d->id }}" {{ old('dokter_id') == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama_dokter }}
                                    </option>
                                @endforeach
                            </select>

                            @error('dokter_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Button --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">
                                Ambil Antrian
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection