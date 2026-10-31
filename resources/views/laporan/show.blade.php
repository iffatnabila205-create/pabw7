@extends('layouts.app')
@section('title', 'Detail Laporan')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4>Detail Laporan #{{ $laporan->id }}</h4>
        <dl class="row mb-0">
            <dt class="col-sm-3">Pelapor</dt><dd class="col-sm-9">{{ $laporan->nama_pelapor }}</dd>
            @auth
                <dt class="col-sm-3">No. HP</dt><dd class="col-sm-9">{{ $laporan->no_hp }}</dd>
            @endauth
            <dt class="col-sm-3">Lokasi</dt><dd class="col-sm-9">{{ $laporan->lokasi }}, {{ $laporan->kecamatan }}</dd>
            <dt class="col-sm-3">Tinggi Air</dt><dd class="col-sm-9">{{ $laporan->tinggi_air }} cm</dd>
            <dt class="col-sm-3">Keterangan</dt><dd class="col-sm-9">{{ $laporan->keterangan ?: '-' }}</dd>
            <dt class="col-sm-3">Status</dt><dd class="col-sm-9">{{ $laporan->status }}</dd>
            <dt class="col-sm-3">Dilaporkan</dt><dd class="col-sm-9">{{ $laporan->created_at->format('d M Y H:i') }}</dd>
            @if ($laporan->foto)
                <dt class="col-sm-3">Foto</dt>
                <dd class="col-sm-9"><img src="{{ asset('storage/'.$laporan->foto) }}" class="img-fluid rounded" style="max-height:360px" alt="Foto banjir"></dd>
            @endif
        </dl>
    </div>
</div>
<a href="{{ route('laporan.index') }}" class="btn btn-link mt-2">&larr; Kembali</a>
@endsection
