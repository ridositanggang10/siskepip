<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei_questions', function (Blueprint $table) {
            $table->string('survei_tag');
            $table->integer('question_number');
            $table->text('question');
            $table->char('sq_instansi_id');
            $table->foreign('sq_instansi_id', 'sq_instansi_id_fk_4321606')->references('id')->on('instansi')->onDelete('cascade');
            $table->char('sq_user_id');
            $table->foreign('sq_user_id','sq_user_id_fk_4321606')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('survei_questions');
    }
}
