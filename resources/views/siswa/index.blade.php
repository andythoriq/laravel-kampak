@extends('layouts.main')
@section('title', 'Siswa')
@section('content')
<x-tabel>
    <x-slot:title>Data Siswa</x-slot>
    <x-slot:link>{{ route('siswa.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                    <th>KELAS</th>
                    <th>PASSWORD</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>{{ $student->kelas->nama }} {{ $student->kelas->jurusan->nama }}</td>
                    <td>{{ $student->password }}</td>
                    <td><a type="button" href="{{ route('siswa.edit', $student->id) }}">Edit</a></td>
                    <td><form action="{{ route('siswa.destroy', $student->id) }}" method="post">@csrf @method('delete')
                        <button type="submit" onclick="return confirm('Menghapus data akan menghapus foreign key nya pada table yang memilikinya')">Hapus</button>
                    </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
