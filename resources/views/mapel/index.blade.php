@extends('layouts.main')
@section('title', 'Maple')
@section('content')
<x-tabel>
    <x-slot:title>Data Matapelajaran</x-slot>
    <x-slot:link>{{ route('mapel.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>MATA PELAJARAN</td>
                    <td colspan="2">ACTION</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->nama }}</td>
                        <td><a type="button" href="{{ route('mapel.edit', $subject->id) }}">Edit</a></td>
                        <td><form action="{{ route('mapel.destroy', $subject->id) }}" method="post"> @csrf @method('delete')
                            <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
