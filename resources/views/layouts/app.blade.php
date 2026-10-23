<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LaporBanjir - @yield('title')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #e8f1fa;
            margin: 0;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #a966ab;
            color: #fff;
            padding: 14px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .brand {
            font-size: 20px;
            font-weight: bold;
        }
        .navbar nav a {
            color: #cfe0f7;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 6px;
        }
        .navbar nav a:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .navbar nav a.active {
            background: #fff;
            color: #b00ff0;
            font-weight: 600;
        }

        /* Tombol logout di navbar */
        .logout-form { display: inline; margin: 0; }
        .navbar nav .btn-logout {
            display: inline-block;
            width: auto;
            margin: 0 0 0 20px;
            padding: 6px 10px;
            background: transparent;
            color: #cfe0f7;
            font-size: 14px;
            border-radius: 6px;
        }
        .navbar nav .btn-logout:hover { background: rgba(255,255,255,0.1); color: #fff; }

        /* Container */
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .card {
            background: #fff;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
        }
        .card.wide {
            max-width: 100%;
        }
        h1 {
            color: #673bb3;
            font-size: 22px;
            margin-bottom: 5px;
        }
        .subtitle {
            color: #555;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* Form */
        label {
            display: block;
            margin-top: 14px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 9px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        button, .btn-back {
            display: inline-block;
            margin-top: 22px;
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            background: #be9ad6;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
        button:hover, .btn-back:hover { background: #905895; }

        .error-box {
            background: #fdecea;
            border: 1px solid #f5c6cb;
            color: #9428c6;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 10px;
        }

        /* Table konfirmasi */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        td { padding: 10px 6px; border-bottom: 1px solid #eee; font-size: 14px; }
        td.label { font-weight: 600; color: #333; width: 45%; }

        /* Alert component */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 18px;
        }
        .alert-success {
            background: #e8f5e9;
            color: #1b5e20;
            border: 1px solid #c8e6c9;
        }
        .alert-danger {
            background: #fdecea;
            color: #c62828;
            border: 1px solid #f5c6cb;
        }

        /* Laporan card (partial) */
        .laporan-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f9fbfd;
            border: 1px solid #e0e8f0;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 12px;
        }
        .laporan-info h3 { margin: 0 0 4px 0; font-size: 15px; color: #8000b7; }
        .laporan-info p { margin: 2px 0; font-size: 13px; color: #555; }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }
        .status-waspada { background: #fff8e1; color: #f9b225; }
        .status-siaga   { background: #fff3e0; color: #ef6c00; }
        .status-awas    { background: #fdecea; color: #c62828; }

        /* Footer */
        footer {
            text-align: center;
            padding: 16px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="brand">Laporan Banjir</div>
        <nav>
            <a href="{{ route('laporbanjir.form') }}" class="{{ request()->routeIs('laporbanjir.form') ? 'active' : '' }}">Form Pelaporan</a>

            @auth
                <a href="{{ route('laporbanjir.daftar') }}" class="{{ request()->routeIs('laporbanjir.daftar') ? 'active' : '' }}">Daftar Laporan</a>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil Petugas</a>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
            @endguest
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} BPBD Kabupaten Bandung — Sistem LaporBanjir (Prototipe)
    </footer>

</body>
</html>