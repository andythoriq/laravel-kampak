@extends('layouts.main')
@section('title', 'Guru')
@section('content')
<x-tabel>
    <x-slot:title>Data Guru</x-slot>
    <x-slot:link>{{ route('guru.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th>JK</th>
                    <th>ALAMAT</th>
                    <th>PASSWORD</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <th>{{ $loop->iteration }}.</th>
                    <td>{{ $teacher->nip }}</td>
                    <td>{{ $teacher->nama }}</td>
                    <td>{{ $teacher->jk == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                    <td>{{ $teacher->alamat }}</td>
                    <td>{{ $teacher->password }}</td>
                    <td><a type="button" href="{{ route('guru.edit', $teacher->id) }}">Edit</a></td>
                    <td><form action="{{ route('guru.destroy', $teacher->id) }}" method="post"> @csrf @method('delete')
                        <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                    </td></form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
