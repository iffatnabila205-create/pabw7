@extends('layouts.app')
@section('title', 'Daftar Laporan')

@section('content')
<h4 class="mb-3">Daftar Laporan Banjir</h4>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                    <th>Lokasi</th>
                    <th>Tinggi Air</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($laporans as $l)
                <tr>
                    <td>{{ $laporans->firstItem() + $loop->index }}</td>
                    <td>{{ $l->created_at->format('d M Y') }}</td>
                    <td>{{ $l->nama_pelapor }}</td>
                    <td>{{ $l->lokasi }}, {{ $l->kecamatan }}</td>
                    <td>{{ $l->tinggi_air }} cm</td>
                    <td>
                        <span class="badge text-bg-{{ ['Menunggu' => 'secondary', 'Diproses' => 'warning', 'Selesai' => 'success'][$l->status] ?? 'secondary' }}">
                            {{ $l->status }}
                        </span>
                    </td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('laporan.show', $l) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        @auth
                            <a href="{{ route('laporan.edit', $l) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('laporan.destroy', $l) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus laporan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada laporan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $laporans->links() }}</div>
@endsection
