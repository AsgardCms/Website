<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTables extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('faq__faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::create('faq__faq_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_id')->unsigned();
            $table->string('locale')->index();

            $table->string('question');
            $table->text('answer');

            $table->unique(['faq_id', 'locale']);
            $table->foreign('faq_id')->references('id')->on('faq__faqs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('faq__faqs');
        Schema::drop('faq__faq_translations');
    }
}
