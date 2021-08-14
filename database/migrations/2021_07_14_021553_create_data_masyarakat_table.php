<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMasyarakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_masyarakat', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->string('nama_lengakap');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan');
            $table->integer('usia');
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
        Schema::dropIfExists('data_masyarakat');
    }
}
