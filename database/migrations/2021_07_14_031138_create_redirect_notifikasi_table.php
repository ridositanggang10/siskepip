<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectNotifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redirect_notifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('rn_id_notifikasi_lama');
            $table->foreign('rn_id_notifikasi_lama','rn_id_notifikasi_lama_fk_4321606')->references('id')->on('notifikasi')->onDelete('cascade');
            $table->char('rn_id_instansi_baru');
            $table->foreign('rn_id_instansi_baru','rn_id_instansi_baru_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
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
        Schema::dropIfExists('redirect_notifikasi');
    }
}
