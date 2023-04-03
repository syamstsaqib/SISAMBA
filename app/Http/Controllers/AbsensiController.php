<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\GuruMapel;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{

    public function lihatpresensi(){
        // $siswa = Auth::user()->siswa->siswakelas;
        // foreach($siswa as $s){
        //     if ($s->status == "aktif") {
        //         $siswa = $s;
        //     }
        // }
        // $hadir = Absensi::where('keterangan','Hadir')->where('siswakelas_id',$siswa->id)->count();
        // $izin = Absensi::where('keterangan','Izin')->where('siswakelas_id',$siswa->id)->count();
        // $sakit = Absensi::where('keterangan','Sakit')->where('siswakelas_id',$siswa->id)->count();
        // $terlambat = Absensi::where('keterangan','Terlambat')->where('siswakelas_id',$siswa->id)->count();
        // $alpa = Absensi::where('keterangan','Alpa')->where('siswakelas_id',$siswa->id)->count();
        return view('walisiswa.lihatpresensi',[
            // 'dtabsen' => Absensi::where('siswakelas_id',$siswa->id)->get(),
            // 'hadir' => $hadir,
            // 'izin' => $izin,
            // 'sakit' => $sakit,
            // 'alpa' => $alpa,
            // 'terlambat' => $terlambat
            ]);
    }

    public function pertemuan(Request $request){
        // return $request;
        $idjurusan = Mapel::find($request->idmapel);
        $idkelas = Kelas::where('kelas_id','=',$request->idkelas)->where('jurusan_id','=',$idjurusan->jurusan_id)->first();
        $idpertemuan = Absensi::where('Kelas_id',$idkelas->id)
        ->where('mapel_id',$request->idmapel)
        ->get()->max('pertemuan_ke');
        return response()->json((($idpertemuan)?$idpertemuan+1:1),200);
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Mapel = GuruMapel::where('');
        return view('guru.absensi',[
            'dtabsen' => Absensi::where('guru_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                             
        
        // $guru=Auth::user()->guru;
        
        // $dtmapel = [];

        // foreach($guru->gurumapel as $mapel){
        //     $dtmapel[$mapel->mapel_id] = $mapel->mapel->nama_mapel.' - '.$mapel->mapel->jurusan->nama_jurusan;
        // }




        return view('guru.tambahabsen',[
            'dtkelas'=>Kelas::pluck('tingkat_kelas','id'),
            // 'dtmapel'=> $dtmapel
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
        $idjurusan = Mapel::find($request->mapel_id);
        $idKelas = Kelas::where('kelas_id',$request->kelas_id)->where('jurusan_id',$idjurusan->jurusan_id)->first();
        Absensi::create([
            'Kelas_id' => $idKelas->id,
            'pertemuan_ke' => $request->pertemuan,
            'waktu' => $request->startTime.' - '.$request->endTime,
            'tgl' => $request->tgl,
            'guru_id' => Auth::user()->guru->id,
            'mapel_id' => $request->mapel_id

        ]);

        return redirect('/guru/absensi')->with('success','Data absen berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show($absensi)
    {
        return view('guru.detailabsen',[
            'dtsiswa' => Absensi::where('absensi_id',$absensi)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($absensi)
    {
        $idkelas = Absensi::find($absensi);

        return view('guru.inputabsen',[
            'dtsiswa' => Siswa::where('Kelas_id',$idkelas->Kelas_id)->get(),
            'dtabsen' => $idkelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$Absensi)
    {
        $absen = Absensi::find($Absensi);
        $dtsiswa = Siswa::where('Kelas_id',$absen->Kelas_id)->get();
        foreach($dtsiswa as $siswa){
            Absensi::create([
                'siswakelas_id' => $siswa->id,
                'absensi_id' => $Absensi,
                'keterangan' => $request[$siswa->id],
            ]);
        }
        $absen->update(['telah_diisi' => true]);

        return redirect('/guru/absensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($absensi)
    {
        Absensi::where('absensi_id', $absensi)->delete();
        Absensi::destroy($absensi);
        return redirect('/guru/absensi');
    }
}
