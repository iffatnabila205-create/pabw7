<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaporBanjir - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand">LaporBanjir</span>
        <div class="navbar-nav ms-auto align-items-center">
            <a class="nav-link" href="{{ route('pelaporan.create') }}">Form Lapor</a>
            <a class="nav-link" href="{{ route('laporan.index') }}">Daftar Laporan</a>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                    @csrf
                    <button class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            @endauth
            @guest
                <a class="nav-link" href="{{ route('login') }}">Login Petugas</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endguest
        </div>
    </div>
</nav>

<main class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

</body>
</html>
