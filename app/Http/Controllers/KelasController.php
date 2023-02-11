<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Kelas::orderBy('nama', 'asc')->get();
        if($classes->count() <= 0){
              Kelas::GeneralMessage('warning', 'Table kelas masih kosong');
        }
        return view('kelas.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Jurusan::select('id','nama')->get();
        return view('kelas.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjectIds = Jurusan::getAllIds();
        dd($subjectIds);
        $newClass = $request->validate([
            'nama' => ['required','in:10,11,12,13', 'unique:tb_kelas,nama,NULL,id,jurusan_id,' . $request->jurusan_id],
            'jurusan_id' => ['required', "in:$subjectIds"],
        ]);
        Kelas::create($newClass);
        return redirect(route('kelas.index'))->with('success','Data kelas berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        return "pal pa le pal pa le pa pale pale";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        $kelas = $kela;
        $subjects = Jurusan::select('id', 'nama')->get();
        return view('kelas.edit', compact('kelas', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $subjectIds = Jurusan::getAllIds();
        $updatedClass = $request->validate([
            'nama' => ['required','in:10,11,12,13', "unique:tb_kelas,nama,{$kela->id},id,jurusan_id," . $request->jurusan_id],
            'jurusan_id' => ['required', "in:$subjectIds"],
        ]);
        if(["nama" => $kela["nama"],"jurusan_id" => $kela["jurusan_id"]] == $updatedClass){
            Kelas::GeneralMessage('warning', 'Tidak ada perubahan data');
            return back();
        }
        $kela->update($updatedClass);
        return redirect(route('kelas.index'))->with('warning', 'Data kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $idKelas = $kela->id;
        $namaKelas = $kela->nama;
        $kela->delete();
        return redirect()->back()->with('danger', "Data kelas dengan ID: $idKelas dan dengan nama kelas: $namaKelas berhasil dihapus");
    }
}