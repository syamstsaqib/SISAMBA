<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WalisiswaController extends Controller
{
    public function ShowDsWalisiswa()
    {
        return view('walisiswa.home', [
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);
    }

    public function showprofile()
    {
        // $user = Auth::user()->siswa;
        // dd($user->siswakelas[0]->id);
        // $siswa = SiswaKelas::find($user->siswakelas->id);

        return view('walisiswa.profile');
    }

    public function editprofile(Request $request, $id)
    {
        $oldsiswa = Siswa::find($id);
        if ($request->hasFile('foto')) {
            if ($oldsiswa->foto != 'foto_profil_siswa/defaultprofile.jpg') {
                Storage::delete($oldsiswa->foto);
            }
            $oldsiswa->update(['foto' => $request->file('foto')->store('foto_profil_siswa')]);
        }
        return redirect('/walisiswa/profile');
    }


    public function index()
    {

        $data = Siswa::with('user', 'kelas')->get();
        return view('admin.datasiswa', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.tambahsiswa', [
            'dtkelas' => Kelas::pluck('tingkat_kelas', 'id'),
            'nomor_induk' => User::pluck('nomor_induk', 'id')
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
        // return $request;
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_induk' => $request->nisn, //kalau masukkan string tidak perlu pakai tanda petik di akhir
            'role' => 'WaliSiswa', //kalau langsung datanya gaperlu pakai $request dan langsung pakai petik lagi
            'password' => bcrypt($request->password),
        ]);
        Siswa::create([
            'user_id' => $user->id, //kalau mau ambil di data lainnya cukup memasukkan $nama data tanpa perlu $request
            'kelas_id' => $request->kelas_id,
            'tgl_lahir' => $request->tgl_lahir,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $request->file('foto')->getClientOriginalName(),
            'alamat' => $request->alamat,
            'nama_wali' => $request->nama_wali,
        ]);
        $request->file('foto')->storeAs('public/foto_siswa/', $request->file('foto')->getClientOriginalName());
        return redirect('/admin/datasiswa')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($siswa)
    {
        $dtk = Siswa::find($siswa);
        $dtsiswa = [
            'foto' => $dtk->siswa->foto,
            'id' => $dtk->user_id,
            ''
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($siswa)
    {

        $dts = Siswa::with('kelas', 'user')->find($siswa); //kalau sudah didalam modal tidak perlu pakai nama modal lagi dibawahnya
        // return $dts;
        $dtsiswa = [
            'foto' => $dts->foto,
            'nisn' => $dts->nisn,
            'id' => $dts->id,
            'nama' => $dts->user->nama,
            'tempat_lahir' => $dts->tempat_lahir,
            'tgl_lahir' => $dts->tgl_lahir,
            'jenis_kelamin' => $dts->jenis_kelamin,
            'alamat' => $dts->alamat,
            'kelas_id' => $dts->kelas->id,
            'nama_wali' => $dts->nama_wali,
            'email' => $dts->user->email
        ];
        return view('admin.siswa.editsiswa', [
            'dts' => $dts,
            'dtsiswa' => $dtsiswa,
            'dtkelas' => Kelas::pluck('tingkat_kelas', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $siswa)
    {
        $siswa = Siswa::find($siswa);
        // cek apakah ada file foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/foto_siswa/', $request->file('foto')->getClientOriginalName());
        } else {
            $file = $siswa->foto;
        }
        Siswa::with('kelas', 'user')->where("id", $siswa->id)->update([
            'foto' => $file,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'nama_wali' => $request->nama_wali,
        ]);

        User::where('id', $siswa->user_id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_induk' => $request->nisn,
            'password' => $request->password ? bcrypt($request->password) : $siswa->user->password,
        ]);
        return redirect('/admin/datasiswa')->with('success', 'Data ' . $request->nama . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($siswa)
    {
        $siswakelas = Siswa::find($siswa);
        User::destroy($siswakelas->user_id);
        $siswakelas->delete();
        return redirect('/admin/datasiswa')->with('success', 'Data berhasil dihapus');
    }
}
