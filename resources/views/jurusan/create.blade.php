@extends('layouts.main')
@section('title', 'Jurusan')
@section('content')
<x-input>
    <x-slot:title>Tambah Data Jurusan</x-slot>
    <x-slot:form>
        <form action="{{ route('jurusan.store') }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td width="25%">NAMA JURUSAN</td>
                    <td width="25%">
                        <input style="padding:6px 0;" type="text" name="nama" value="{{ old('nama') }}" size="35" placeholder="contoh: Rekayasa Perangkat Lunak">
                        @error('nama')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                    </td>
                </tr>
            </table>
        </form>
    </x-slot>
</x-tabel>
@endsection
