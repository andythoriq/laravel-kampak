<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Mapel::all();
        if($subjects->count() <= 0){
            session()->flash('message', [
                'type' => 'warning',
                'text' => 'Table mapel masih kosong'
              ]);
        }
        return view('mapel.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSubject = $request->validate([
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191', 'unique:tb_mapel']
        ]);
        Mapel::create($newSubject);
        return redirect(route('mapel.index'))->with('success','Data matapelajaran berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        return "yahaha wahyu";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        function cekPerubahanNama($request, $mapel){
            if ($request->nama == $mapel->nama) {
                return '';
            }
            return 'unique:tb_mapel';
        }
        $updatedSubject = $request->validate([
            'nama' => ['required', 'regex:/^[A-Z][a-z]+((\s[A-Z][a-z]+)*)$/u', 'max:191', cekPerubahanNama($request, $mapel)]
        ]);
        $mapel->update($updatedSubject);
        return redirect(route('mapel.index'))->with('warning', 'Data matapelajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        $namaMapel = $mapel->nama;
        $idMapel = $mapel->id;
        $mapel->delete();
        return back()->with('danger', "Data matapelajaran dengan ID: $idMapel dan dengan nama: $namaMapel berhasil dihapus");
    }
}
