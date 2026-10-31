@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="card shadow-sm mx-auto" style="max-width:480px">
    <div class="card-body">
        <h4>Login Petugas</h4>
        <p class="text-muted">Masuk untuk mengelola laporan banjir.</p>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3 mb-0">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</div>
@endsection
