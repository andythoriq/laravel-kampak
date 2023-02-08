<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Guru::all();
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
            'nama' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        Guru::create($newTeacher);
        return redirect(route('guru.index'))->with('success', 'Data Guru Berhasil di Tambah');
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
            'nama' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        $updatedTeacher['nip'] = $guru->nip;
        $guru->update($updatedTeacher);
        return redirect(route('guru.index'))->with('success', 'DataGuru Berhasil di Ubah');
    }


    public function destroy(Guru $guru)
    {
        $namaGuru = $guru->nama;
        $idGuru = $guru->id;
        $guru->delete();
        return back()->with('warning', "Data Guru dengan ID, $idGuru dan dengan Nama, $namaGuru Berhasil di Hapus");
    }
}
