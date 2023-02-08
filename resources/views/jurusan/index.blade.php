@extends('layouts.main')
@section('title', 'Jurusan')
@section('content')
<x-tabel>
    <x-slot:title>Data Jurusan</x-slot>
    <x-slot:link>{{ route('jurusan.create') }}</x-slot>
    <x-slot:table>
        <table cellpadding="10" cellspacing="0" border="1">
            
        </table>
    </x-slot>
</x-tabel>
@endsection