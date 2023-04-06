@extends('layouts.main')
@section('title', 'Nilai')
@section('content')
<x-tabel>
    <x-slot:title>Data Nilai</x-slot>
    <x-slot:link>{{ route('nilai.create') }}</x-slot>
    <x-slot:table>
        <table class="TableMantap">
            <thead>
                <tr>
                    <th>NO</th>

                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </x-slot>
</x-tabel>
@endsection
