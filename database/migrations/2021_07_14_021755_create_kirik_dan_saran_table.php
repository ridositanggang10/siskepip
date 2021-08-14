<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKirikDanSaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kirik_dan_saran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('ks_instansi_id');
            $table->foreign('ks_instansi_id','ks_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->char('masyarakat_id');
            $table->foreign('masyarakat_id','masyarakat_id_fk_4321606')->references('id')->on('data_masyarakat')->onDelete('cascade');
            $table->text('pesan');
            $table->string('foto')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('kirik_dan_saran');
    }
}
