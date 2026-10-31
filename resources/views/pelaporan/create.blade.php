@extends('layouts.app')
@section('title', 'Form Pelaporan')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4>Form Laporan Banjir</h4>
        <p class="text-muted">Isi data berikut dan lampirkan foto kondisi banjir.</p>

        <form method="POST" action="{{ route('pelaporan.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Pelapor</label>
                <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}"
                       class="form-control @error('nama_pelapor') is-invalid @enderror">
                @error('nama_pelapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                       class="form-control @error('no_hp') is-invalid @enderror">
                @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                       class="form-control @error('lokasi') is-invalid @enderror">
                @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" value="{{ old('kecamatan') }}"
                       class="form-control @error('kecamatan') is-invalid @enderror">
                @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tinggi Air (cm)</label>
                <input type="number" name="tinggi_air" value="{{ old('tinggi_air') }}"
                       class="form-control @error('tinggi_air') is-invalid @enderror">
                @error('tinggi_air') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="3"
                          class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Bukti (jpg/jpeg/png, maks. 2 MB)</label>
                <input type="file" name="foto"
                       class="form-control @error('foto') is-invalid @enderror">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary w-100">Kirim Laporan</button>
        </form>
    </div>
</div>
@endsection