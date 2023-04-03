<?php

namespace Database\Seeders;

use App\Models\Tahun_Ajaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tahun_Ajaran::create([
            'tahun'=>'2022/2023'
        ]);
    }
}
