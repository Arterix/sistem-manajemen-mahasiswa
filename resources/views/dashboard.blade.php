@extends('layouts.app')

@section('content')
<h2 class="page-title mb-4">Dashboard</h2>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-number">{{ $total }}</div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card variant-2">
            <div class="stat-number">{{ $perJurusan->count() }}</div>
            <div class="stat-label">Jumlah Jurusan</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card variant-3">
            <div class="stat-number">{{ $terbaru->count() }}</div>
            <div class="stat-label">Data Terbaru</div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">Mahasiswa per Jurusan</div>
    <div class="card-body p-0">
        @if($perJurusan->isEmpty())
            <p class="text-muted p-3 mb-0">Belum ada data.</p>
        @else
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:52px">No</th>
                        <th>Jurusan</th>
                        <th class="text-end" style="width:160px">Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perJurusan as $index => $j)
                    <tr>
                        <td class="text-muted">{{ $index + 1 }}</td>
                        <td>{{ $j->jurusan }}</td>
                        <td class="text-end">
                            <span class="badge bg-primary">{{ $j->jumlah }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>5 Mahasiswa Terbaru</span>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
        @if($terbaru->isEmpty())
            <p class="text-muted p-3 mb-0">Belum ada data.</p>
        @else
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:52px">No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th style="width:80px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terbaru as $index => $mahasiswa)
                    <tr>
                        <td class="text-muted">{{ $index + 1 }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td><code style="background:transparent;color:inherit;font-size:0.88em">{{ $mahasiswa->nim }}</code></td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
