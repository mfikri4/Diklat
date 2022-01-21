<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoKuotaDiklatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_kuota_diklat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('periode');
            $table->string('jadwal_diklat');
            $table->integer('sisa_kuota');
            $table->integer('status');
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
        Schema::dropIfExists('info_kuota_diklat');
    }
}
