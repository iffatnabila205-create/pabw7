@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="card">
    <h1>Register Petugas</h1>
    <p class="subtitle">Buat akun petugas BPBD untuk mengelola laporan banjir.</p>

    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit">Daftar</button>
    </form>
</div>
@endsection