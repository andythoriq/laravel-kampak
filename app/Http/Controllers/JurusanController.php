<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Jurusan::all();
        if($majors->count() <= 0){
            session()->flash('message', [
                'type' => 'warning',
                'text' => 'Table jurusan masih kosong'
              ]);
        }
        return view('jurusan.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newMajor = $request->validate([
            'nama' => ['required', 'unique:tb_jurusan', 'regex:/^[A-Z][a-z\s]+((\s[A-Z][a-z]+)*)$/u', 'max:191']
        ]);
        Jurusan::create($newMajor);
        return redirect(route('jurusan.index'))->with('success', 'Data jurusan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        return "wlee";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        function cekPerubahanNama($request, $jurusan){
            if ($request->nama == $jurusan->nama) {
                return '';
            }
            return 'unique:tb_jurusan';
        }
        $updatedMajor = $request->validate([
            'nama' => ['required', cekPerubahanNama($request, $jurusan), 'regex:/^[A-Z][a-z\s]+((\s[A-Z][a-z]+)*)$/u', 'max:191']
        ]);
        $jurusan->update($updatedMajor);
        return redirect(route('jurusan.index'))->with('warning', 'Data jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $namaJurusan = $jurusan->nama;
        $idJurusan = $jurusan->id;
        $jurusan->delete();
        return back()->with('danger', "Data jurusan dengan ID, $idJurusan dan dengan nama, $namaJurusan berhasil dihapus");
    }
}
