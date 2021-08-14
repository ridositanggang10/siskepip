<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPenilaianInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penilaian_instansi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('hpi_instansi_id');
            $table->foreign('hpi_instansi_id', 'hpi_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->integer('jumlah_rating');
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
        Schema::dropIfExists('hasil_penilaian_instansi');
    }
}
