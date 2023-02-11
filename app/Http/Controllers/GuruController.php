<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Guru::all();
        if($teachers->count() <= 0){
            Guru::GeneralMessage('warning', 'Tabel guru masih kosong');
        }
        return view('guru.index', compact('teachers'));
    }


    public function create()
    {
        return view('guru.create');
    }


    public function store(Request $request)
    {
        $newTeacher = $request->validate([
            'nip' => ['required', 'unique:tb_guru', 'numeric', 'digits_between:1,18'],
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        Guru::create($newTeacher);
        return redirect(route('guru.index'))->with('success', 'Data guru berhasil ditambah');
    }


    public function show(Guru $guru)
    {
        return dd($guru);
    }


    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }


    public function update(Request $request, Guru $guru)
    {
        $updatedTeacher = $request->validate([
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        if(['nama' => $guru['nama'], 'jk' => $guru['jk'], 'alamat' => $guru['alamat'], 'password' => $guru['password']] == $updatedTeacher){
            Guru::GeneralMessage('warning', 'Tidak ada perubahan data');
            return back();
        }
        $updatedTeacher['nip'] = $guru->nip;
        $guru->update($updatedTeacher);
        return redirect(route('guru.index'))->with('success', 'Data guru berhasil diubah');
    }


    public function destroy(Guru $guru)
    {
        $namaGuru = $guru->nama;
        $idGuru = $guru->id;
        $guru->delete();
        return redirect()->back()->with('warning', "Data guru dengan ID: $idGuru dan dengan nama: $namaGuru telah dihapus");
    }
}
