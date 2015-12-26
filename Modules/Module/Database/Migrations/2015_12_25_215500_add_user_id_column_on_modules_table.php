<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUserIdColumnOnModulesTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->unsigned();
            $table->integer('favourites')->after('changelog');
            $table->integer('total_downloads')->after('changelog');
            $table->integer('monthly_downloads')->after('changelog');
            $table->integer('daily_downloads')->after('changelog');
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->dropForeign('module__modules_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('favourites');
            $table->dropColumn('total_downloads');
            $table->dropColumn('monthly_downloads');
            $table->dropColumn('daily_downloads');
        });
    }

}
