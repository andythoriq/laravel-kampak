@extends('layouts.main')
@section('title', 'Jurusan')
@section('content')
<x-input>
    <x-slot:title>Edit Data {{ $jurusan->nama }}</x-slot>
    <x-slot:form>
        
    </x-slot>
</x-tabel>
@endsection