<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\SiswaKelas;



class Nilai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mapel(){
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
    public function siswa(){
        return $this->belongsTo(Siswa::class,'siswa_id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class);
    }
}
