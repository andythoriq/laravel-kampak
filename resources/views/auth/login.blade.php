@extends('layouts.main')
@section('title', 'Login')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <table align="center" cellpadding=10>
        <tr>
            <td>Role</td>
            <td> :</td>
            <td>
                <select class="form-select form-select-lg" name="role">
                    <option value="">-- pilih role --</option>
                    <option value="siswa">Siswa</option>
                    <option value="guru">Guru</option>
                    <option value="admin">Admin</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>NIS / NIP / Kode Admin</td>
            <td> :</td>
            <td>
                <input type="numeric" name="perkodean" width="30">
            </td>
        </tr>
        <tr>
            <td>password</td>
            <td> :</td>
            <td>
                <input type="password" name="password" width="30">
            </td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>
@endsection
