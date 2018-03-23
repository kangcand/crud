<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Dosen;
use Session;
use App\Hobi;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mhs = Mahasiswa::with('Dosen')->get();
        return view('mahasiswa.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::all();
        $hobi = Hobi::all();
        return view('mahasiswa.create',compact('dosen','hobi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nim' => 'required|unique:mahasiswas',
            'dosen_id' => 'required',
            'hobi' => 'required'
        ]);
        $mhs = new Mahasiswa;
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->dosen_id = $request->dosen_id;
        $mhs->save();
        // attach fungsinya untuk melampirkan data,yang dilampirkan disini ialah data dari method Hobi
        //  yang ada di model mahasiswa
        $mhs->Hobi()->attach($request->hobi);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->nama</b>"
        ]);
        return redirect()->route('mahasiswa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show',compact('mhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $dosen = Dosen::all();
        $selectedDosen = Mahasiswa::findOrFail($id)->dosen_id;
        $selected = $mhs->Hobi->pluck('id')->toArray();
        $hobi = Hobi::all();
        // dd($selected);
        return view('mahasiswa.edit',compact('mhs','dosen','selectedDosen','selected','hobi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nim' => 'required|',
            'dosen_id' => 'required',
            'hobi' => 'required'
        ]);
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->dosen_id = $request->dosen_id;
        $mhs->save();
        $mhs->Hobi()->sync($request->hobi);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->nama</b>"
        ]);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Mahasiswa::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('mahasiswa.index');
    }
}
