<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedirectKritikDanSaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redirect_kritik_dan_saran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('rkds_old_id');
            $table->foreign('rkds_old_id','rkds_old_id_fk_4321606')->references('id')->on('kirik_dan_saran')->onDelete('cascade');
            $table->char('rkds_masyarakat_id');
            $table->foreign('rkds_masyarakat_id','rkds_masyarakat_id_fk_4321606')->references('id')->on('data_masyarakat')->onDelete('cascade');
            $table->char('rkds_instansi_id');
            $table->foreign('rkds_instansi_id', 'rkds_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
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
        Schema::dropIfExists('redirect_kritik_dan_saran');
    }
}
