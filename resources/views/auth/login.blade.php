@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card card-auth shadow-lg">
    <div class="card-body">

        <h3 class="text-center mb-4">Login</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            {{-- Remember --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Remember Me</label>
            </div>

            {{-- Button --}}
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>

            <div class="text-center mt-3">
                Belum punya akun?
                <a href="{{ route('register') }}">Register</a>
            </div>

        </form>
    </div>
</div>
@endsection