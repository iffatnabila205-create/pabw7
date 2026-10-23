@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div class="card">
    <h1>Profil Petugas</h1>
    <p class="subtitle">Data akun yang sedang login.</p>

    <table>
        <tr>
            <td class="label">Nama</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td class="label">Akun dibuat</td>
            <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>
</div>
@endsection