<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datakelas', [
            'dtkelas' => Kelas::all(),
            'dtguru' => Guru::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas =  [
            "1", "2", "3", "4", "5", "6"
        ];
        return view('admin.kelas.tambahkelas', [
            'kelas' => $kelas,
            'walikelas' => Guru::join('users', 'users.id', '=', 'gurus.user_id')->select('users.nama', 'gurus.id')->pluck('nama', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kelas::create([
            'kelas' => $request->kelas + 1,
            'kode_kelas' => $request->kode_kelas,
            'walikelas' => $request->walikelas,
        ]);
        return redirect('/admin/datakelas')->with('success', 'Data Kelas Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idguru = Guru::join('users', 'users.id', '=', 'gurus.user_id')->select('users.name', 'gurus.id')->pluck('name', 'id');
        $dtkelas = Kelas::where('guru_id', '!=', "null")->get();
        $dtguru = Guru::all();
        foreach ($dtkelas as $kelas) {
            foreach ($dtguru as $guru) {
                if ($guru->id == $kelas->guru_id) {
                    unset($idguru[$guru->id]);
                }
            }
        }
        $walicurrent = Kelas::find($id);
        foreach ($dtkelas as $kelas) {
            if ($kelas->guru_id == $walicurrent->guru_id) {
                $idguru[$walicurrent->guru_id] = $walicurrent->guru->user->name;
            }
        }

        return view('admin.walikelas', [
            'guru' => $idguru,
            'wali' => $walicurrent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update([
            'kode_kelas' => $request->kode_kelas,
            'walikelas' => $request->walikelas,
        ]);
        return redirect('/admin/datakelas')->with('success', 'Wali kelas Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect('/admin/datakelas')->with('success', 'Data Kelas Berhasil Dihapus');
    }
}
