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
            $table->string('name');
            $table->string('nis');
            $table->string('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('religion')->nullable();
            $table->string('phone')->nullable();

            // ATTACHMENT
            $table->string('kwh_rumah')->nullable();
            $table->string('nilai_rapor')->nullable();
            $table->string('foto_rumah_tampak_depan')->nullable();
            $table->string('foto_rumah_tampak_kiri')->nullable();
            $table->string('foto_rumah_tampak_kanan')->nullable();
            $table->string('foto_rumah_tampak_belakang')->nullable();
            $table->string('foto_rumah_dapur')->nullable();
            $table->string('foto_rumah_tempat_belajar')->nullable();
            $table->string('foto_rumah_foto_bersama_dalam_rumah')->nullable();

            // STATUS
            $table->string('type_beasiswa')->nullable();
            $table->integer('status_beasiswa')->nullable();
            $table->text('keterangan')->nullable();
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
