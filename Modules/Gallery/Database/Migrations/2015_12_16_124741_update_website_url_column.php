<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateWebsiteUrlColumn extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('gallery__galleries', function (Blueprint $table) {
            $table->string('website_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('gallery__galleries', function (Blueprint $table) {
        });
    }

}
