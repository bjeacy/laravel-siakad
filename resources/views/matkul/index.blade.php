{{-- resources/views/matkul/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
    <h1>Data Mata Kuliah</h1>

    <table>
        <tr>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>
            <th>SKS</th>
        </tr>

        @foreach ($matkul as $data_matkul)
            <tr>
                <td>{{ $data_matkul->kode }}</td>
                <td>{{ $data_matkul->nama }}</td>
                <td>{{ $data_matkul->sks }}</td>
            </tr>
        @endforeach
    </table>
@endsection
