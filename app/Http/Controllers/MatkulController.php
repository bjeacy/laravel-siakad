<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = [
            (object) ['kode' => 'IF101', 'nama' => 'Pemrograman Web', 'sks' => 3],
            (object) ['kode' => 'IF102', 'nama' => 'Basis Data', 'sks' => 3],
            (object) ['kode' => 'IF103', 'nama' => 'Struktur Data', 'sks' => 3],
            (object) ['kode' => 'IF104', 'nama' => 'Jaringan Komputer', 'sks' => 2],
            (object) ['kode' => 'IF105', 'nama' => 'Sistem Operasi', 'sks' => 3],
        ];

        return view('matkul.index', compact('matkul'));
    }
}
