<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'nim'     => 'required|string|max:20|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:100',
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json($mahasiswa, 201);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'nim'     => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
            'jurusan' => 'required|string|max:100',
        ]);

        $mahasiswa->update($validated);

        return response()->json($mahasiswa, 200);
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $mahasiswa->delete();

        return response()->json(['message' => 'Data mahasiswa berhasil dihapus.'], 200);
    }
}
