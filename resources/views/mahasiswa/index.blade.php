@extends('layouts.app')

@section('content')
@php
    function sortUrl(string $column, string $currentSort, string $currentDir): string {
        $newDir = ($currentSort === $column && $currentDir === 'asc') ? 'desc' : 'asc';
        return request()->fullUrlWithQuery(['sort' => $column, 'dir' => $newDir]);
    }
    function sortIcon(string $column, string $currentSort, string $currentDir): string {
        if ($currentSort !== $column) return '<span class="sort-indicator" style="opacity:0.35">⇅</span>';
        return '<span class="sort-indicator">' . ($currentDir === 'asc' ? '▲' : '▼') . '</span>';
    }
@endphp

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Daftar Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Mahasiswa</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($mahasiswas->isEmpty())
    <div class="alert alert-info">Belum ada data mahasiswa.</div>
@else
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:52px">No</th>
                        <th>
                            <a href="{{ sortUrl('nama', $sort, $dir) }}">
                                Nama {!! sortIcon('nama', $sort, $dir) !!}
                            </a>
                        </th>
                        <th>
                            <a href="{{ sortUrl('nim', $sort, $dir) }}">
                                NIM {!! sortIcon('nim', $sort, $dir) !!}
                            </a>
                        </th>
                        <th>
                            <a href="{{ sortUrl('jurusan', $sort, $dir) }}">
                                Jurusan {!! sortIcon('jurusan', $sort, $dir) !!}
                            </a>
                        </th>
                        <th style="width:180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td class="text-muted">{{ $index + 1 }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td><code style="background:transparent;color:inherit;font-size:0.88em">{{ $mahasiswa->nim }}</code></td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data {{ $mahasiswa->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <p class="text-muted mt-2" style="font-size:0.8rem">
        {{ $mahasiswas->count() }} data &mdash; diurutkan berdasarkan
        <strong>{{ $sort }}</strong> ({{ $dir === 'asc' ? 'A–Z' : 'Z–A' }})
    </p>
@endif
@endsection
