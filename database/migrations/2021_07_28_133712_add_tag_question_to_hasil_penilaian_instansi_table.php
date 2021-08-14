<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagQuestionToHasilPenilaianInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil_penilaian_instansi', function (Blueprint $table) {
            $table->string('question_tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_penilaian_instansi', function (Blueprint $table) {
            $table->string('question_tag');
        });
    }
}
