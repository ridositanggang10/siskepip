<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeRowsToSurveiQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survei_questions', function (Blueprint $table) {
            $table->text('judul');
            $table->string('opsi_1');
            $table->string('opsi_2');
            $table->string('opsi_3');
            $table->string('opsi_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survei_questions', function (Blueprint $table) {
            //
        });
    }
}
