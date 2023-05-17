<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'guru_id' => 2,
            'tingkat_kelas' => '1',
            'kode_kelas' => 'Salman',
            'semester' => '1',
        ]);
        Kelas::create([
            'tahun_ajaran_id' => 1,
            'guru_id' => 2,
            'tingkat_kelas' => '2',
            'kode_kelas' => 'Lukman',
            'semester' => '1',
        ]);
        Kelas::create([
            'tahun_ajaran_id' => 1,
            'guru_id' => 2,
            'tingkat_kelas' => '3',
            'kode_kelas' => 'Ikhwan',
            'semester' => '1',
        ]);
        Kelas::create([
            'tahun_ajaran_id' => 1,
            'guru_id' => 2,
            'tingkat_kelas' => '4',
            'kode_kelas' => 'Thoriq',
            'semester' => '1',
        ]);
        Kelas::create([
            'tahun_ajaran_id' => 1,
            'guru_id' => 2,
            'tingkat_kelas' => '5',
            'kode_kelas' => 'Umar',
            'semester' => '1',
        ]);
        Kelas::create([
            'tahun_ajaran_id' => 1,
            'guru_id' => 2,
            'tingkat_kelas' => '6',
            'kode_kelas' => 'Mars',
            'semester' => '1',
        ]);
    }
}
