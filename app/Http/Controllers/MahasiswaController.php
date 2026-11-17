<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function tampil()
    {
        $mahasiswa = Mahasiswa::all();
        return view('tampilmahasiswa', compact('mahasiswa'));
    }

    public function detil($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('detilmahasiswa', compact('mahasiswa'));
    }

    public function apiIndex()
    {
        return response()->json(['data' => Mahasiswa::all()]);
    }

    public function apiShow($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return $mahasiswa
            ? response()->json(['data' => $mahasiswa])
            : response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
    }

    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'nohp' => 'nullable|string|max:20',
        ]);

        return response()->json(['data' => Mahasiswa::create($data)], 201);
    }

    public function apiDestroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        $mahasiswa->delete();
        return response()->json(null, 204);
    }
}
