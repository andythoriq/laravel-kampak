@extends('layouts.main')
@section('title', 'Data Guru')
@section('content')
<x-input>
    <x-slot:title>Tambah Data Guru</x-slot>
    <x-slot:form>
        <form action="{{ route('guru.store') }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td width="25%">NIP</td>
                    <td width="25%">
                        <input type="text" name="nip" value="{{ old('nip') }}">
                        @error('nip')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                    
                </tr>
                <tr>
                    <td width="25%">NAMA GURU</td>
                    <td width="25%">
                        <input type="text" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">JENIS KELAMIN</td>
                    <td width="25%">
                        <select name="jk">
                            <option value="">-- pilih jenis kelamin --</option>
                            <option value="L" @selected(old('jk') == 'L')>Laki-Laki</option>
                            <option value="P" @selected(old('jk') == 'P')>Perempuan</option>
                        </select>
                        @error('jk')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">ALAMAT</td>
                    <td width="25%">
                        <textarea name="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">PASSWORD</td>
                    <td width="25%">
                        <input type="password" name="password">
                        @error('password')
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