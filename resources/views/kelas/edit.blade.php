@extends('layouts.main')
@section('title', 'Kelas')
@section('content')
    <x-input>
        <x-slot:title>Edit Data Kelas {{ $kelas->nama }}</x-slot>
        <x-slot:back>kelas</x-slot>
        <x-slot:form>
            <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
                @csrf @method('put')
                <table width="50%">
                    <tr>
                        <td width="25%">NAMA KELAS</td>
                        <td width="25%">
                            <select name="nama">
                                <option value="">-- pilih kelas berapa --</option>
                                @for ($i = 10; $i <= 13; $i++)
                                    <option value="{{ $i }}" @selected(old('nama', $kelas->nama) == $i)>Kelas {{ $i }}</option>
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
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected(old('jurusan_id', $kelas->jurusan_id) == $subject->id)>{{ $subject->nama }}</option>
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

