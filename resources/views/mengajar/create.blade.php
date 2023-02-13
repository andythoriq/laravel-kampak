@extends('layouts.main')
@section('title', 'Mengajar')
@section('content')
    <x-input>
        <x-slot:title>Tambah Data Mengajar</x-slot>
        <x-slot:back>mengajar</x-slot>
        <x-slot:form>
            <form action="{{ route('mengajar.store') }}" method="post">
                @csrf
                <table width="50%">
                    <tr>
                        <td width="25%">NAMA GURU</td>
                        <td width="25%">
                            <select name="guru_id">
                                <option value="">-- pilih guru --</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @selected(old('guru_id') == $teacher->id)>{{ $teacher->nama }}</option>
                                @endforeach
                            </select>
                            @error('guru_id')
                                <br><span style="color: red">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">MATAPELAJARAN</td>
                        <td width="25%">
                             <select name="mapel_id">
                                <option value="">-- pilih matapelajaran --</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected(old('mapel_id') == $subject->id)>{{ $subject->nama }}</option>
                                @endforeach
                             </select>
                            @error('mapel_id')
                                <br><span style="color: red">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">KELAS</td>
                        <td width="25%">
                             <select name="kelas_id">
                                <option value="">-- pilih kelas (jurusan) --</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" @selected(old('kelas_id') == $class->id)>{{ $class->nama }} {{ $class->jurusan->nama ?? '*tidak ada' }}</option>
                                @endforeach
                             </select>
                            @error('kelas_id')
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
