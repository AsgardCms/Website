<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqAnswerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq__answer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');

            $table->integer('answer_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['answer_id', 'locale']);
            $table->foreign('answer_id')->references('id')->on('faq__answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('faq__answer_translations');
    }
}
