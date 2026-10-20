<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = [
            (object) ['nidn' => '0012345678', 'nama' => 'Dr. Rakha Fernandes, M.Kom.', 'prodi' => 'Teknik Informatika', 'email' => 'rakhafernandes@budiluhur.ac.id'],
            (object) ['nidn' => '0087654321', 'nama' => 'Rakha Fernandes, M.Kom.', 'prodi' => 'Sistem Informasi', 'email' => 'rakhafernandes@budiluhur.ac.id'],
            (object) ['nidn' => '0011223344', 'nama' => 'Rakha Fernandes, S.Kom., M.T.', 'prodi' => 'Teknik Informatika', 'email' => 'rakhafernandes@budiluhur.ac.id'],
        ];

        return view('dosen.index', compact('dosen'));
    }
}
