<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\GuruMapel;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowDsGuru()
    {
        return view('guru.home', [
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            // 'dtkelas' => Kelas_jurusan::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);
    }

    public function profile()
    {
        $user = Guru::where('user_id', Auth::user()->id)->first();
        return view('guru.profile', compact('user'));
    }

    public function profile_edit(Request $request, $id)
    {
        $olddata = Guru::find($id);
        DB::beginTransaction();
        try {
            if ($request->hasFile('foto')) {
                if ($olddata->foto != 'foto_guru/defaultprofile.jpg') {
                    Storage::delete($olddata->foto);
                }
                $olddata->update([
                    'foto' => $request->file('foto')->getClientOriginalName(),
                ]);
                $request->file('foto')->storeAs('public/foto_guru/', $request->file('foto')->getClientOriginalName());
            }
            $olddata->user->update([
                'nama' => $request->nama
            ]);
            $olddata->update([
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat
            ]);

            DB::commit();
            return redirect('/guru/profile');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e)->withInput();
        }
    }

    // public function changePassword(Request $request){
    //     // return $request;
    //     $user = Auth::user();
    //     $userPassword = $user->password;
    //     // dd($request);
    //     $request->validate([
    //         'current_password' => 'required',
    //         'password' => 'required|same:renewpassword',
    //         'renewpassword' => 'required'
    //     ]);

    //     if (!Hash::check($request->current_password,$userPassword)) {
    //         return back()->withErrors(['current_password'=>'Password salah'])->withInput();
    //     }

    //     $user->update(['password' => Hash::make($request->password)]);

    //     return redirect('/guru/profile')->with('success','Password Berhasil diubah');
    // }

    public function showsiswa()
    {
        return view('guru.datasiswa', [
            // 'dtsiswa' => SiswaKelas::with('siswa','kelas_jurusan')->latest()->get(),
        ]);
    }

    // public function detailsiswa($siswa){
    //     $dts = SiswaKelas::find($siswa);
    //     $dtsiswa = [
    //         'foto' => $dts->siswa->foto,
    //         'NISN' => $dts->siswa->NISN,
    //         'id' => $dts->siswa_id,
    //         'nama_siswa' => $dts->siswa->user->name,
    //         'tempat_lahir' => $dts->siswa->tempat_lahir,
    //         'tgl_lahir' => $dts->siswa->tgl_lahir,
    //         'jenis_kelamin' => $dts->siswa->jenis_kelamin,
    //         'alamat' => $dts->siswa->alamat,
    //         'kelas' => $dts->kelas_jurusan->kelas->tingkat_kelas,
    //         'jurusan' => $dts->kelas_jurusan->jurusan->nama_jurusan,
    //         'nama_wali' => $dts->siswa->nama_wali,
    //         'email' => $dts->siswa->user->email
    //     ];
    //     return response()->json($dtsiswa,200);
    // }

    public function index()
    {
        $data = Guru::with('user')->latest()->get();
        return view('admin.dataguru', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.tambahguru', [
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
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_induk' => $request->nip, //kalau masukkan string tidak perlu pakai tanda petik di akhir
            'role' => 'Guru', //kalau langsung datanya gaperlu pakai $request dan langsung pakai petik lagi
            'password' => bcrypt($request->password),
        ]);
        Guru::create([
            'user_id' => $user->id,
            'foto' => $request->file('foto')->getClientOriginalName(),
            'tempat_lahir' => $request->tempat_lahir,
            'nip' => $request->nip,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
        $request->file('foto')->storeAs('public/foto_guru/', $request->file('foto')->getClientOriginalName());
        return redirect('/admin/dataguru')->with('success', 'Data Guru Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($guru)
    {
        return view('admin.guru.detailguru', [
            'guru' => Guru::with('kelas_jurusan', 'gurumapel')->find($guru)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($guru)
    {
        $dtg = Guru::find($guru);
        $dtguru = [
            'id' => $dtg->id,
            'nip' => $dtg->nip,
            'nama' => $dtg->user->nama,
            'tempat_lahir' => $dtg->tempat_lahir,
            'tgl_lahir' => $dtg->tgl_lahir,
            'jenis_kelamin' => $dtg->jenis_kelamin,
            'alamat' => $dtg->alamat,
            'mapel_id' => $dtg->mapel_id,
            'email' => $dtg->user->email
        ];
        return view('admin.guru.editguru', [
            'nip' => $dtg->nip,
            'dtguru' => $dtguru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guru)
    {
        $dtOld = Guru::find($guru);
        if ($request->file('foto') != null) {
            $request->file('foto')->storeAs('public/foto_guru/', $request->file('foto')->getClientOriginalName());
            $file = $request->file('foto')->getClientOriginalName();
        } else {
            $file = $dtOld->foto;
        }
        $dtOld->update([
            'foto' => $file,
            'tempat_lahir' => $request->tempat_lahir,
            'nip' => $request->nip,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
        $dtOld->user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_induk' => $request->nip,
            'password' => $request->password ? bcrypt($request->password) : $dtOld->user->password,
        ]);

        return redirect('/admin/dataguru')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($guru)
    {
        $dtguru = Guru::with('user', 'kelas')->find($guru);
        Guru::where('id', $guru)->delete();
        if ($dtguru->foto != 'foto_profil_guru/defaultprofile.jpg') {
            Storage::delete($dtguru->foto);
        }

        $dtguru->user->delete();
        Absensi::where('guru_id', $guru)->delete();
        $dtguru->delete();

        return redirect('/admin/dataguru')->with('success', 'Data Berhasil Dihapus');
    }
}
