@extends('layouts.main')
@section('title', 'Kelas')
@section('content')
<x-tabel>
    <x-slot:title>Data Kelas</x-slot>
    <x-slot:link>{{ route('kelas.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KELAS</th>
                    <th>JURUSAN</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->nama }}</td>
                        <td>{{ $class->jurusan->nama }}</td>
                        <td><a type="button" href="{{ route('kelas.edit', $class->id) }}">Edit</a></td>
                        <td><form action="{{ route('kelas.destroy', $class->id) }}" method="post"> @csrf @method('delete')
                            <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
