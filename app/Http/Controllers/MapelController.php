<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Kelas_jurusan;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Facade\Ignition\DumpRecorder\Dump;

class MapelController extends Controller
{

    public function tambahpengampu()
    {
        return view('layouts.editpengampu', [
            'guru' => Guru::join('users', 'users.id', '=', 'gurus.user_id')->pluck('users.name', 'gurus.id')
        ]);
    }

    public function ambilpengampu($id)
    {
        // $cekpengampu = GuruMapel::join('mapels','mapels.id','=','guru_mapels.mapel_id')
        //                 ->join('gurus','gurus.id','=','guru_mapels.guru_id')
        //                 ->join('users','users.id','=','gurus.user_id')
        //                 ->where('guru_mapels.mapel_id',$id)->get();
        // return $cekpengampu;
        // $pengampu = [];
        // if($cekpengampu){
        //     foreach($cekpengampu as $c){
        //         $pengam
        //     }
        // }
        // return view('');
    }

    public function inputpengampu(Request $request, $id)
    {

        // GuruMapel::where('mapel_id',$id)->delete();
        // $bts = 0;
        // foreach($request->input() as $v){
        //     if ($bts < 2) {
        //         $bts++;
        //     }else{
        //         if ($v) {
        //             $cekpengampu = GuruMapel::where('guru_id',$v)->where('mapel_id',$id)->first();
        //             if ($cekpengampu == null) {
        //                 GuruMapel::create([
        //                     'mapel_id' => $id,
        //                     'guru_id' => $v
        //                 ]);
        //             }
        //         }
        //     }
        // }
        return redirect('/admin/datamapel')->with('success', 'Pengampu berhasil di edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtMapel = Mapel::with('guru')->get();
        $dtGuru = Guru::with('user')->get();
        return view('admin.datamapel', compact('dtMapel', 'dtGuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get guru where belum memiliki mapel
        $dtguru = Guru::join("users", 'users.id', '=', 'gurus.user_id')->pluck('users.nama', 'gurus.id');
        return view('admin.mapel.tambahmapel', compact('dtguru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mapel::create([
            "guru_id" => $request->guru_id,
            'mapel' => $request->nama_mapel,
            'kkm' => $request->KKM
        ]);
        return redirect('/admin/datamapel')->with('success', 'Data Mapel Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($mapel)
    {
        return view('admin.mapel.editmapel', [
            'mapel' => Mapel::find($mapel),
            // 'dtjurusan' => Jurusan::pluck('nama_jurusan','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mapel)
    {
        Mapel::where('id', $mapel)->update([
            'mapel' => $request->mapel,
            'kkm' => $request->kkm,
            'guru_id' => $request->guru
        ]);
        return redirect('/admin/datamapel')->with('success', 'Data Mapel Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($mapel)
    {
        Mapel::destroy($mapel);
        return redirect('/admin/datamapel')->with('success', 'Data Mapel Berhasil Dihapus');
    }
}
