@extends('layouts.main')
@section('title', 'Mengajar')
@section('content')
<x-tabel>
    <x-slot:title>Data Mengajar</x-slot>
    <x-slot:link>{{ route('mengajar.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MENGAJAR</th>
                    <th>JURUSAN</th>
                    <th>JURUSAN</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachings as $teaching)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teaching->nama }}</td>
                        <td>{{ $teaching->jurusan->nama }}</td>
                        <td><a type="button" href="{{ route('mengajar.edit', $teaching->id) }}">Edit</a></td>
                        <td><form action="{{ route('mengajar.destroy', $teaching->id) }}" method="post"> @csrf @method('delete')
                            <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
