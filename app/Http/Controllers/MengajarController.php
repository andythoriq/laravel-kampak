<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachings = Mengajar::with(['guru:id,nama', 'mapel:id,nama', 'kelas.jurusan:id,nama'])->get();
        if($teachings->count() <= 0){
              Mengajar::GeneralMessage('warning', 'Tabel mengajar masih kosong');
        }
        return view('mengajar.index', compact('teachings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Guru::select('id', 'nama')->get();
        $subjects = Mapel::select('id', 'nama')->get();
        $classes = Kelas::with('jurusan:id,nama')->select('id', 'nama', 'jurusan_id')->orderBy('nama', 'asc')->get();
        return view('mengajar.create', compact('teachers', 'subjects', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacherIds = Guru::getAllColumn('id');
        $subjectIds = Mapel::getAllColumn('id');
        $classIds = Kelas::getAllColumn('id');
        $newTeaching = $request->validate([
            'guru_id' => ['required',"in:$teacherIds"],
            'mapel_id' => ['required', "in:$subjectIds"],
            'kelas_id' => ['required', "in:$classIds"]
        ]);
        Mengajar::create($newTeaching);
        return redirect(route('mengajar.index'))->with('success','Data mengajar berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Mengajar $mengajar)
    {
        return "asu";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengajar $mengajar)
    {
        $teachers = Guru::select('id', 'nama')->get();
        $subjects = Mapel::select('id', 'nama')->get();
        $classes = Kelas::with('jurusan:id,nama')->select('id', 'nama', 'jurusan_id')->orderBy('nama', 'asc')->get();
        return view('mengajar.edit', compact('mengajar', 'teachers', 'subjects', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        $teacherIds = Guru::getAllColumn('id');
        $subjectIds = Mapel::getAllColumn('id');
        $classIds = Kelas::getAllColumn('id');
        $updatedTeaching = $request->validate([
            'guru_id' => ['required',"in:$teacherIds"],
            'mapel_id' => ['required', "in:$subjectIds"],
            'kelas_id' => ['required', "in:$classIds"]
        ]);
        if(['guru_id' => $mengajar['guru_id'], 'mapel_id' => $mengajar['mapel_id'], 'kelas_id' => $mengajar['kelas_id']] == $updatedTeaching){
            Mengajar::GeneralMessage('warning', 'Tidak ada perubahan data');
            return back();
        }
        $mengajar->update($updatedTeaching);
        return redirect(route('mengajar.index'))->with('success', 'Data mengajar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        $idMengajar = $mengajar->id;
        $mengajar->delete();
        return redirect()->back()->with('warning', "Data mengajar dengan ID: $idMengajar telah dihapus");
    }
}