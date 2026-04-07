<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $allowed = ['nama', 'nim', 'jurusan'];
        $sort = in_array($request->query('sort'), $allowed) ? $request->query('sort') : 'nama';
        $dir  = $request->query('dir') === 'desc' ? 'desc' : 'asc';

        $mahasiswas = Mahasiswa::orderBy($sort, $dir)->get();
        return view('mahasiswa.index', compact('mahasiswas', 'sort', 'dir'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'nim'     => 'required|string|max:20|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:100',
        ]);

        Mahasiswa::create($request->only('nama', 'nim', 'jurusan'));

        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama'    => 'required|string|max:255',
            'nim'     => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
            'jurusan' => 'required|string|max:100',
        ]);

        $mahasiswa->update($request->only('nama', 'nim', 'jurusan'));

        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
