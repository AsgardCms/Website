<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryGalleriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery__galleries', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

			$table->string('website_url');
			$table->string('website_name');
			$table->string('owner_url');
			$table->string('owner_name');

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
		Schema::drop('gallery__galleries');
	}
}
