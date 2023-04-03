<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detailabsensi;
use App\Models\Kelas_jurusan;
use App\Models\Guru;
use App\Models\Mapel;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
    public function siswa(){
        return $this->belongsTo(Siswa::class,'mapel_id');
    }
}
