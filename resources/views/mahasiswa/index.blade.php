{{-- resources/views/mahasiswa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <h1>Data Mahasiswa</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Semester</th>
            <th>Status</th>
        </tr>

        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->semester }}</td>
                <td>
                    @if ($mhs->status == 'Aktif')
                        <span class="status-aktif">Aktif</span>
                    @else
                        <span class="status-cuti">Cuti</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
