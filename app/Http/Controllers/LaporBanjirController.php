<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporBanjirController extends Controller
{
    public function index()
    {
        return view('laporbanjir.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor'     => 'required|string|max:100',
            'lokasi'           => 'required|string|max:150',
            'tinggi_genangan'  => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date',
        ]);

        Laporan::create($validated);   // simpan ke database

        return view('laporbanjir.konfirmasi', $validated);
    }

    public function daftar()
    {
        return view('laporbanjir.daftar', [
            'laporans' => Laporan::all(),   // ambil dari database
        ]);
    }
    public function profil()
    {
        return view('profil', ['user' => Auth::user()]);
    }
}