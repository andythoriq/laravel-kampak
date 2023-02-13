@extends('layouts.main')
@section('title', 'Kelas')
@section('content')
    <x-input>
        <x-slot:title>Tambah Data Kelas</x-slot>
        <x-slot:back>kelas</x-slot>
        <x-slot:form>
            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="25%">KELAS</td>
                        <td width="25%">
                            <select name="nama">
                                <option value="">-- pilih kelas berapa --</option>
                                @for ($i = 10; $i <= 13; $i++)
                                    <option value="{{ $i }}" @selected(old('nama') == $i)>Kelas {{ $i }}</option>
                                @endfor
                            </select>
                            @error('nama')
                                <br><span style="color: red">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">NAMA JURUSAN</td>
                        <td width="25%">
                             <select name="jurusan_id">
                                <option value="">-- pilih jurusan apa --</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}" @selected(old('jurusan_id') == $major->id)>{{ $major->nama }}</option>
                                @endforeach
                             </select>
                            @error('jurusan_id')
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
