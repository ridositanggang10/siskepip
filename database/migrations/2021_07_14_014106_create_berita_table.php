<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('berita_instansi_id');
            $table->foreign('berita_instansi_id', 'berita_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->string('judul');
            $table->text('link')->nullable();
            $table->text('berita_description');
            $table->string('berita_foto')->nullable();
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
        Schema::dropIfExists('berita');
    }
}
