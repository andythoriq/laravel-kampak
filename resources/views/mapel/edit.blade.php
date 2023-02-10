@extends('layouts.main')
@section('title', 'Mapel')
@section('content')
<x-input>
    <x-slot:title>Edit Data {{ $mapel->nama }}</x-slot>
    <x-slot:form>
        <form action="{{ route('mapel.update', $mapel->id) }}" method="post">
            @csrf @method('put')
            <table width="50%">
                <tr>
                    <td width="25%">NAMA MATAPELAJARAN</td>
                    <td width="25%">
                        <input style="padding:6px 0;" type="text" name="nama" value="{{ old('nama', $mapel->nama) }}" size="35" placeholder="contoh: Matematika">
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
</x-input>
@endsection
