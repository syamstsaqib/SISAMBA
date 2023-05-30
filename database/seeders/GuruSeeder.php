<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::insert([
            [
                'user_id' => 2,
                'foto' => 'PORBIKAWA.png',
                'nip' => '10181069',
                'tempat_lahir' => 'Sinjai',
                'tgl_lahir' => '2002-01-19',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'jl.banana'
            ],
            [
                'user_id' => 3,
                'foto' => 'PORBIKAWA.png',
                'nip' => '10181069',
                'tempat_lahir' => 'Sinjai',
                'tgl_lahir' => '2002-01-19',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'jl.banana'
            ],
        ]);
    }
}
