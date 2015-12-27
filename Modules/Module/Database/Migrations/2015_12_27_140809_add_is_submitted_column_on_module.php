<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIsSubmittedColumnOnModule extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->timestamp('submitted_at')->after('favourites')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->dropColumn('submitted_at');
        });
    }
}
