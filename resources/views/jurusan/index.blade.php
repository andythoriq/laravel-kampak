@extends('layouts.main')
@section('title', 'Jurusan')
@section('content')
<x-tabel>
    <x-slot:title>Data Jurusan</x-slot>
    <x-slot:link>{{ route('jurusan.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>JURUSAN</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors as $major)
                    <tr>
                        <th>{{ $loop->iteration }}.</th>
                        <td>{{ $major->nama }}</td>
                        <td><a type="button" href="{{ route('jurusan.edit', $major->id) }}">Edit</a></td>
                        <td><form action="{{ route('jurusan.destroy', $major->id) }}" method="post">@csrf @method('delete')
                            <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
