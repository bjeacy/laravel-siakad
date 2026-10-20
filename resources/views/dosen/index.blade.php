{{-- resources/views/dosen/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
    <h1>Data Dosen</h1>

    <table>
        <tr>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Program Studi</th>
            <th>Email</th>
        </tr>

        @foreach ($dosen as $data_dosen)
            <tr>
                <td>{{ $data_dosen->nidn }}</td>
                <td>{{ $data_dosen->nama }}</td>
                <td>{{ $data_dosen->prodi }}</td>
                <td>{{ $data_dosen->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection
