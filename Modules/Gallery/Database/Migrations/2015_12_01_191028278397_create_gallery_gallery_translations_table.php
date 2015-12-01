<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryGalleryTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery__gallery_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->text('description');

            $table->integer('gallery_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['gallery_id', 'locale']);
            $table->foreign('gallery_id')->references('id')->on('gallery__galleries')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gallery__gallery_translations');
	}
}
