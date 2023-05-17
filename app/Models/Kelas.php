<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas_jurusan;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // walikelas from guru
    public function dataWalikelas()
    {
        return $this->belongsTo(Guru::class, 'walikelas', 'id');
    }

    // public function guru(){
    //     return $this->belongsTo(Guru::class);
    // }
    // public function tahun_ajaran(){
    //     return $this->belongsTo(Tahun_Ajaran::class);
    // }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    // public function absen(){
    //     return $this->hasMany(Absensi::class);
    // }
}
