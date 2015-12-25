<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleModulesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module__modules', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->boolean('is_published')->default(false);
			$table->string('packagist_url');
			$table->string('vendor');
			$table->string('name');
			$table->string('slug');
			$table->text('excerpt');
			$table->text('description');
			$table->text('documentation');
			$table->text('changelog');
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
		Schema::drop('module__modules');
	}
}
