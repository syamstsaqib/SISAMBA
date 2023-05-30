<?php

namespace Database\Seeders;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'user_id' => 5,
            'tgl_lahir' => '2003-10-10',
            'nisn' => '22222222',
            'tempat_lahir' => 'Bandung',
            'jenis_kelamin' => 'Laki-laki',
            'foto' => 'siswa1.png',
            'alamat' => 'Bandung',
            'nama_wali' => 'Rhoy',
        ]);
    }
}
