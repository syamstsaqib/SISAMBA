<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('role', 'Admin')->get();
        return view('super-admin.dataadmin', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.tambahadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'nomor_induk' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "Admin",
        ]);
        return redirect('/superadmin/dataadmin')->with('success', 'Data Admin Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        $dtadmin = [
            'id' => $admin->id,
            'nip' => $admin->nomor_induk,
            'nama' => $admin->nama,
            'email' => $admin->email,
        ];
        return view('super-admin.editadmin', [
            'nip' => $admin->nomor_induk,
            'dtadmin' => $dtadmin
        ]);
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
        $admin = User::find($id);
        $admin->update([
            'nomor_induk' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);
        return redirect('/superadmin/dataadmin')->with('success', 'Data Admin Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect('/superadmin/dataadmin')->with('success', 'Data Admin Berhasil Dihapus');
    }
}
