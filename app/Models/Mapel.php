<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuruMapel;
use App\Models\Nilai;
use App\Models\Jurusan;
use App\Models\Absensi;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function tahun_ajaran(){
        return $this->belongsTo(Tahun_Ajaran::class);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
    public function tugas(){
        return $this->hasMany(Tugas::class);
    }
    public function absen(){
        return $this->hasMany(Absensi::class);
    }
}
