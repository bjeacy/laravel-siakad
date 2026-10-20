{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <div class="card-box">
        <div class="card">
            <h3>Jumlah Mahasiswa</h3>
            <h2>{{ $jumlahMahasiswa }}</h2>
        </div>

        <div class="card">
            <h3>Jumlah Dosen</h3>
            <h2>{{ $jumlahDosen }}</h2>
        </div>

        <div class="card">
            <h3>Jumlah Mata Kuliah</h3>
            <h2>{{ $jumlahMatkul }}</h2>
        </div>
    </div>
@endsection
