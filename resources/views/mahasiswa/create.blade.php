{{-- resources/views/mahasiswa/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1>Tambah Mahasiswa</h1>

    <div class="form-card">
        <form action="/mahasiswa" method="POST">
            @csrf

            <x-form-input name="nim" label="NIM" />
            <x-form-input name="nama" label="Nama" />
            <x-form-input name="prodi" label="Program Studi" />
            <x-form-input name="semester" label="Semester" type="number" />
            <x-form-input name="email" label="Email" type="email" />

            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
