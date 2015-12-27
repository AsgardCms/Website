<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddExtraTimestampsColumnsOnModule extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->dropColumn('is_published');
            $table->timestamp('published_at')->after('submitted_at')->nullable()->default(null);
            $table->timestamp('rejected_at')->after('submitted_at')->nullable()->default(null);
            $table->renameColumn('packagist_url', 'packagist_uri');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('module__modules', function (Blueprint $table) {
            $table->boolean('is_published')->default(false);
            $table->dropColumn('published_at');
            $table->dropColumn('rejected_at');
            $table->renameColumn('packagist_uri', 'packagist_url');
        });
    }

}
