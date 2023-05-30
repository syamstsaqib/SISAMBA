<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kelas_id')->nullable();
            $table->date('tgl_lahir');
            $table->string('nisn');
            $table->String('tempat_lahir');
            $table->String('jenis_kelamin');
            $table->String('foto');
            $table->String('alamat');
            $table->String('nama_wali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
