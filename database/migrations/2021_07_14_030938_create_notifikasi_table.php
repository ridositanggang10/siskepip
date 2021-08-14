<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('n_instansi_id');
            $table->foreign('n_instansi_id', 'n_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->char('n_jenis_notif_id');
            $table->foreign('n_jenis_notif_id', 'n_jenis_notif_id_fk_4321606')->references('id')->on('jenis_notifikasi')->onDelete('cascade');
            $table->string('isi_notifikasi');
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
        Schema::dropIfExists('notifikasi');
    }
}
