@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card">
    <h1>Login Petugas</h1>
    <p class="subtitle">Masuk untuk melihat daftar laporan banjir.</p>

    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit">Login</button>
    </form>
</div>
@endsection