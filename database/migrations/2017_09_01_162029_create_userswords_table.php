<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userswords', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('word_id')->unsigned();
            $table->foreign('word_id')->references('id')->on('words')->onUpdate('cascade')->onDelete('restrict');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->integer('failures');
            $table->integer('letter_consumed');
            $table->enum('isevade',['Y','N'])->default('N');
            $table->enum('status',['IP','CO','IE'])->default('IP');
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
        Schema::dropIfExists('userswords');
    }
}
