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
        $classes = Kelas::with('jurusan:id,nama')->orderBy('nama', 'asc')->get();
        if($classes->count() <= 0){
              Kelas::GeneralMessage('warning', 'Tabel kelas masih kosong');
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
        $majors = Jurusan::select('id','nama')->get();
        return view('kelas.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $majorIds = Jurusan::getAllColumn('id');
        $newClass = $request->validate([
            'nama' => ['required','in:10,11,12,13', 'unique:tb_kelas,nama,NULL,id,jurusan_id,' . $request->jurusan_id],
            'jurusan_id' => ['required', "in:$majorIds"],
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
        $majors = Jurusan::select('id', 'nama')->get();
        return view('kelas.edit', compact('kelas', 'majors'));
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
        $majorIds = Jurusan::getAllColumn('id');
        $updatedClass = $request->validate([
            'nama' => ['required','in:10,11,12,13', "unique:tb_kelas,nama,{$kela->id},id,jurusan_id," . $request->jurusan_id],
            'jurusan_id' => ['required', "in:$majorIds"],
        ]);
        if(["nama" => $kela["nama"],"jurusan_id" => $kela["jurusan_id"]] == $updatedClass){
            return back()->with('warning', 'Tidak ada perubahan data');
        }
        $kela->update($updatedClass);
        return redirect(route('kelas.index'))->with('success', 'Data kelas berhasil diubah');
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
        return redirect()->back()->with('warning', "Data kelas dengan ID: $idKelas dan dengan nama kelas: $namaKelas telah dihapus");
    }
}