<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopPageFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entame_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_cd');
            $table->tinyInteger('category');
            $table->longText('link');
            $table->string('thought', 500)->nullable($value = true);
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
        Schema::dropIfExists('entame_info');
    }
}
