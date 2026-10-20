<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            (object) ['nim' => '2024001', 'nama' => 'Rakha Fernandes', 'prodi' => 'Teknik Informatika', 'semester' => 3, 'status' => 'Aktif'],
            (object) ['nim' => '2024002', 'nama' => 'Fauzan Aminudin', 'prodi' => 'Sistem Informasi', 'semester' => 5, 'status' => 'Aktif'],
            (object) ['nim' => '2024003', 'nama' => 'Raja Bagus', 'prodi' => 'Teknik Informatika', 'semester' => 1, 'status' => 'Aktif'],
            (object) ['nim' => '2024004', 'nama' => 'Mahesa', 'prodi' => 'Sistem Informasi', 'semester' => 3, 'status' => 'Cuti'],
            (object) ['nim' => '2024005', 'nama' => 'Fajri', 'prodi' => 'Teknik Informatika', 'semester' => 7, 'status' => 'Aktif'],
        ];

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'email' => 'required|email',
        ]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
}
