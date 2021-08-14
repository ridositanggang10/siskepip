<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_akun', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->char('ra_instansi_id');
            $table->foreign('ra_instansi_id', 'ra_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->char('ra_user_id');
            $table->foreign('ra_user_id', 'ra_user_id_fk_4321606')->references('id')->on('users')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('request_akun');
    }
}
