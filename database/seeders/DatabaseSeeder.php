<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\MapelSeeder;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\KelasjurusanSeeder;
use Database\Seeders\GuruMapelSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\GuruSeeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'nomor_induk' => 11111111,
            'password' => Hash::make('12345'),
            'role' => 'SuperAdmin'
        ]);

        User::create([
            'nama' => 'Syams Tsaqib',
            'email' => 'admin@gmail.com',
            'nomor_induk' => 10191084,
            'password' => Hash::make('12345'),
            'role' => 'Admin'
        ]);
        User::create([
            'nama' => 'Guru',
            'email' => 'ridha@gmail.com',
            'nomor_induk' => '10181069',
            'password' => Hash::make('12345'),
            'role' => 'Guru'
        ]);
        User::create([
            'nama' => 'Rhoy',
            'email' => 'rhoy@gmail.com',
            'nomor_induk' => '76131',
            'password' => Hash::make('12345'),
            'role' => 'WaliSiswa'
        ]);

        User::create([
            'nama' => 'Siswa',
            'email' => 'siswa1@gmail.com',
            'nomor_induk' => '22222222',
            'password' => Hash::make('12345'),
            'role' => 'Siswa',
        ]);

        // User::create([
        //     'name'=>'Guru',
        //     'email' => 'guru@gmail.com',
        //     'password'=>Hash::make('12345'),
        //     'role'=>'Guru'
        // ]);
        // User::create([
        //     'name'=>'Pandaman',
        //     'email' => 'Pandaman@gmail.com',
        //     'password'=>Hash::make('12345'),
        //     'role'=>'WaliSiswa'
        // ]);
        // User::create([
        //     'name'=>'Siswa',
        //     'email' => 'Siswa@gmail.com',
        //     'password'=>Hash::make('12345'),
        //     'role'=>'WaliSiswa'
        // ]);

        // User::create([
        //     'name'=>'Guru2',
        //     'email' => 'guru2@gmail.com',
        //     'password'=>Hash::make('12345'),
        //     'role'=>'Guru'
        // ]);


        $this->call([
            GuruSeeder::class,
            SiswaSeeder::class,
            // KelasSeeder::class,
            // TahunAjaranSeeder::class,
        ]);
    }
}
