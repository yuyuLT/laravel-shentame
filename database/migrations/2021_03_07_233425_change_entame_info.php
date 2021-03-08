<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEntameInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entame_info', function (Blueprint $table) {
            $table->integer('user_name')->change();
            $table->renameColumn('user_name', 'user_id');

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
            $table->renameColumn('user_id','user_name');
            $table->varchar('user_name')->change();

        });
    }
}
