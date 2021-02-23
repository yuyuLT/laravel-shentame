<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entame_info', function (Blueprint $table) {
            $table->renameColumn('user_cd', 'user_name');
            $table->renameColumn('category', 'title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entame_info', function (Blueprint $table) {
            $table->renameColumn('user_name','user_cd');
            $table->renameColumn('title','category');
        });
    }
}
