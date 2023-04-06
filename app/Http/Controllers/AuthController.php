<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Administrator;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }
    public function login(Request $req) {
        $validatedData = $req->validate([
            'role' => ['required', 'in:siswa,guru,admin'],
            'perkodean' => ['required', 'numeric'],
            'password' => ['required']
        ]);
        switch ($validatedData['role']) {
            case 'siswa':
                if($siswa = Siswa::select('nama', 'nis')->where('nis', $validatedData['perkodean'])->where('password', $validatedData['password'])->first()) {
                    session(['role' => 'siswa', 'nis' => $siswa ->nis, 'nama' => $siswa->nama]);
                    return redirect(route('home'));
                }
                break;
            case 'guru':
                if($guru = Guru::select('nama', 'nip')->where('nip', $validatedData['perkodean'])->where('password', $validatedData['password'])->first()) {
                    session(['role' => 'guru', 'nip' => $guru ->nip, 'nama' => $guru->nama]);
                    return redirect(route('home'));
                }
                break;
            case 'admin':
                if($administrator = Administrator::select('id_admin')->where('id_admin', $validatedData['perkodean'])->where('password', $validatedData['password'])->first()) {
                    session(['role' => 'administrator', 'id_admin' => $administrator ->id_admin]);
                    return redirect(route('home'));
                }
                break;
        }
        return back()->with('warning', 'Ada yang salah.');
    }
    public function logout(Request $req) {
        $req->session()->invalidate();
        return redirect(route('home'));
    }
}