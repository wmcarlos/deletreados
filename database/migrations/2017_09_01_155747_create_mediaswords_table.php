<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediaswords', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('medias')->onUpdate('cascade')->onDelete('restrict');

            $table->integer('word_id')->unsigned();
            $table->foreign('word_id')->references('id')->on('words')->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('mediaswords');
    }
}
