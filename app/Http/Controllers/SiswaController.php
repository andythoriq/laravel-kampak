<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $students = Siswa::all();
        if($students->count() <= 0){
            Siswa::GeneralMessage('warning', 'Tabel siswa masih kosong');
        }
        return view('siswa.index', compact('students'));
    }


    public function create()
    {
        $classes = Kelas::select('id', 'nama', 'jurusan_id')->orderBy('nama', 'asc')->get();
        return view('siswa.create', compact('classes'));
    }


    public function store(Request $request)
    {
        $classIds = Kelas::getAllColumn('id');
        $newStudent = $request->validate([
            'nis' => ['required', 'unique:tb_siswa', 'numeric', 'digits_between:1,10'],
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'kelas_id' => ['required', "in:$classIds"],
            'password' => ['required']
        ]);
        Siswa::create($newStudent);
        return redirect(route('siswa.index'))->with('success', 'Data siswa berhasil ditambah');
    }


    public function show(Siswa $siswa)
    {
        return "km pst tkt sm eps glng";
    }


    public function edit(Siswa $siswa)
    {
        $classes = Kelas::select('id', 'nama', 'jurusan_id')->orderBy('nama', 'asc')->get();
        return view('siswa.edit', compact('siswa', 'classes'));
    }


    public function update(Request $request, Siswa $siswa)
    {
        $updatedStudent = $request->validate([
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191'],
            'jk' => ['required', 'in:L,P'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        if(['nama' => $siswa['nama'], 'jk' => $siswa['jk'], 'alamat' => $siswa['alamat'], 'password' => $siswa['password']] == $updatedStudent){
            Siswa::GeneralMessage('warning', 'Tidak ada perubahan data');
            return back();
        }
        $updatedStudent['nis'] = $siswa->nis;
        $siswa->update($updatedStudent);
        return redirect(route('siswa.index'))->with('success', 'Data siswa berhasil diubah');
    }


    public function destroy(Siswa $siswa)
    {
        $namaSiswa = $siswa->nama;
        $idSiswa = $siswa->id;
        $siswa->delete();
        return redirect()->back()->with('warning', "Data siswa dengan ID: $idSiswa dan dengan nama: $namaSiswa telah dihapus");
    }
}