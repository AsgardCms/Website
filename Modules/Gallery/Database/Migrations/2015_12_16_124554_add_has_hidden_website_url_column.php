<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHasHiddenWebsiteUrlColumn extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('gallery__galleries', function (Blueprint $table) {
            $table->boolean('has_hidden_website_url')->default(false)->after('website_name');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('gallery__galleries', function (Blueprint $table) {
            $table->dropColumn('has_hidden_website_url');
        });
    }

}
