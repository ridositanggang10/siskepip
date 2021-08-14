<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstansiBaruToRedirectKritikDanSaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redirect_kritik_dan_saran', function (Blueprint $table) {
            $table->char('instansi_baru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redirect_kritik_dan_saran', function (Blueprint $table) {
            $table->char('instansi_baru');
        });
    }
}
