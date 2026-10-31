<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function create()
    {
        return view('pelaporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp'        => 'required|string|max:20',
            'lokasi'       => 'required|string|max:150',
            'kecamatan'    => 'required|string|max:100',
            'tinggi_air'   => 'required|integer|min:0',
            'keterangan'   => 'nullable|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.required' => 'Foto bukti wajib diunggah.',
            'foto.image'    => 'File harus berupa gambar.',
            'foto.mimes'    => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'      => 'Ukuran foto maksimal 2 MB.',
        ]);

        // simpan file ke storage/app/public/laporan, yang masuk DB hanya path-nya
        $validated['foto'] = $request->file('foto')->store('laporan', 'public');

        Laporan::create($validated);

        return redirect()->route('pelaporan.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih!');
    }
}