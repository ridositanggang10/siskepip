<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSurveiMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_survei_masyarakat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('hsm_masyarakat_id');
            $table->foreign('hsm_masyarakat_id','hsm_masyarakat_id_fk_4321606')->references('id')->on('data_masyarakat')->onDelete('cascade');
            $table->char('hsm_instansi_id');
            $table->foreign('hsm_instansi_id', 'hsm_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->string('question_tag');
            $table->integer('question_number');
            $table->integer('penilaian_user');
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
        Schema::dropIfExists('hasil_survei_masyarakat');
    }
}
