<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Absensi;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // add nip get attribute from user model nomor_induk
    // public function getNipAttribute()
    // {
    //     return $this->user->nomor_induk;
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function absen()
    {
        return $this->hasMany(Absensi::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public function walikelas()
    {
        return $this->belongsTo(Kelas::class, 'id', 'walikelas');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
