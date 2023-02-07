@extends('layouts.main')
@section('title', 'Tambah Data Guru')
@section('content')
<x-input>
    <x-slot:title>Tambah Data Guru</x-slot>
    <x-slot:form>
        <form action="{{ route('guru.store') }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td width="25%">NIP</td>
                    <td width="25%"><input type="text" name="nip" value="{{ old('nip') }}"></td>
                    @error('nip')
                        <td><span style="color: red">{{ $message }}</span></td>
                    @enderror
                </tr>
                <tr>
                    <td width="25%">NAMA GURU</td>
                    <td width="25%"><input type="text" name="nama" value="{{ old('nama') }}"></td>
                    @error('nama')
                        <td><span style="color: red">{{ $message }}</span></td>
                    @enderror
                </tr>
                <tr>
                    <td width="25%">JENIS KELAMIN</td>
                    <td width="25%">
                        <input type="radio" name="jk" value="L">Laki-Laki
                        <input type="radio" name="jk" value="P">Perempuan
                    </td>
                    @error('jk')
                        <td><span style="color: red">{{ $message }}</span></td>
                    @enderror
                </tr>
                <tr>
                    <td width="25%">ALAMAT</td>
                    <td width="25%"><textarea name="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea></td>
                    @error('alamat')
                        <td><span style="color: red">{{ $message }}</span></td>
                    @enderror
                </tr>
                <tr>
                    <td width="25%">PASSWORD</td>
                    <td width="25%"><input type="password" name="password"></td>
                    @error('password')
                        <td><span style="color: red">{{ $message }}</span></td>
                    @enderror
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