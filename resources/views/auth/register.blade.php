@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="card card-auth shadow-lg">
    <div class="card-body">

        <h3 class="text-center mb-4">Register</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}">

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror">

                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            {{-- Button --}}
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-user-plus"></i> Register
            </button>

            <div class="text-center mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </div>

        </form>
    </div>
</div>
@endsection