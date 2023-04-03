<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_Ajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mapel(){
        return $this->hasMany(Mapel::class);
    }
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
