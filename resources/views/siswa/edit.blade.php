@extends('layouts.main')
@section('title', 'Siswa')
@section('content')
<x-input>
    <x-slot:title>Edit Data {{ $siswa->nama }}</x-slot>
    <x-slot:back>siswa</x-slot>
    <x-slot:form>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf @method('put')
            <table width="50%">
                <tr>
                    <td width="25%">NIS</td>
                    <td width="25%"><input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" @disabled(true)>
                        @error('nis')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">NAMA SISWA</td>
                    <td width="25%">
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}">
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
                            <option value="L" @selected(old('jk', $siswa->jk) == 'L')>Laki-Laki</option>
                            <option value="P" @selected(old('jk', $siswa->jk) == 'P')>Perempuan</option>
                        </select>
                        @error('jk')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">ALAMAT</td>
                    <td width="25%">
                        <textarea name="alamat" cols="30" rows="10">{{ old('alamat', $siswa->alamat) }}</textarea>
                        @error('alamat')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%">
                        <select name="kelas_id">
                            <option value="">-- pilih kelas apa --</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" @selected(old('kelas_id', $siswa->kelas_id) == $class->id)>{{ $class->nama }} {{ $class->jurusan->nama }}</option>
                            @endforeach
                         </select>
                        @error('kelas_id')
                            <br><span style="color: red">{{ $message }}</span>
                        @enderror
                    </td>
                    </td>
                </tr>
                <tr>
                    <td width="25%">PASSWORD</td>
                    <td width="25%">
                        <input type="password" name="password" value="{{ $siswa->password }}">
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
</x-input>
@endsection
