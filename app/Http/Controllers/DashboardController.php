<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMahasiswa = 120;
        $jumlahDosen = 35;
        $jumlahMatkul = 25;

        return view('dashboard', compact('jumlahMahasiswa', 'jumlahDosen', 'jumlahMatkul'));
    }
}
