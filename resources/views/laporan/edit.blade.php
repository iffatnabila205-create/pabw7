@extends('layouts.app')
@section('title', 'Edit Laporan')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4>Edit Laporan #{{ $laporan->id }}</h4>
        <form method="POST" action="{{ route('laporan.update', $laporan) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            @foreach ([
                'nama_pelapor' => 'Nama Pelapor', 'no_hp' => 'No. HP', 'lokasi' => 'Lokasi',
                'kecamatan' => 'Kecamatan', 'tinggi_air' => 'Tinggi Air (cm)',
            ] as $name => $label)
                <div class="mb-3">
                    <label class="form-label">{{ $label }}</label>
                    <input type="text" name="{{ $name }}" value="{{ old($name, $laporan->$name) }}"
                           class="form-control @error($name) is-invalid @enderror">
                    @error($name) <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            @endforeach

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" rows="3" class="form-control">{{ old('keterangan', $laporan->keterangan) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    @foreach (['Menunggu', 'Diproses', 'Selesai'] as $s)
                        <option value="{{ $s }}" @selected(old('status', $laporan->status) === $s)>{{ $s }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti Foto (opsional)</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('laporan.index') }}" class="btn btn-link">Batal</a>
        </form>
    </div>
</div>
@endsection
