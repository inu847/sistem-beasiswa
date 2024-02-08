<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerwaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perwalians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat_ortu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->unsignedBigInteger('siswa_id')->index();
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
        Schema::dropIfExists('perwalians');
    }
}
