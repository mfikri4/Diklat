<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_profil', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('nik');
            $table->string('no_hp');
            $table->string('name_ibu');
            $table->string('tempat');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pendidikan_terakhir');
            $table->string('kewarganegaraan');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');            
            $table->string('kelurahan');            
            $table->string('alamat');            
            $table->string('rt');            
            $table->string('rw');            
            $table->string('kode_pos');            
            $table->string('file_foto');            
            $table->string('file_ktp');            
            $table->string('file_ijazah_darat');            
            $table->string('file_akte');            
            $table->string('name_sekolah');
            
            
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
        Schema::dropIfExists('info_profil');
    }
}
