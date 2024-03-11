<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdForeignKeyToResearchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_details', function (Blueprint $table) {
            // Define foreign key constraint for user_id
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_details', function (Blueprint $table) {
            // Drop foreign key constraint for user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
