@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title">Detail Mahasiswa</h2>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="card" style="max-width:560px">
    <div class="card-header">{{ $mahasiswa->nama }}</div>
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <tbody>
                <tr>
                    <td class="form-label mb-0 ps-3" style="width:140px">ID</td>
                    <td class="text-muted" style="font-size:0.85em">{{ $mahasiswa->id }}</td>
                </tr>
                <tr>
                    <td class="form-label mb-0 ps-3">Nama</td>
                    <td>{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td class="form-label mb-0 ps-3">NIM</td>
                    <td><code style="background:transparent;color:inherit">{{ $mahasiswa->nim }}</code></td>
                </tr>
                <tr>
                    <td class="form-label mb-0 ps-3">Jurusan</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                </tr>
                <tr>
                    <td class="form-label mb-0 ps-3">Dibuat</td>
                    <td class="text-muted" style="font-size:0.875em">{{ $mahasiswa->created_at->format('d M Y, H:i') }}</td>
                </tr>
                <tr>
                    <td class="form-label mb-0 ps-3">Diperbarui</td>
                    <td class="text-muted" style="font-size:0.875em">{{ $mahasiswa->updated_at->format('d M Y, H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex gap-2 py-3 px-3">
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST"
              onsubmit="return confirm('Yakin hapus data {{ $mahasiswa->nama }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection
