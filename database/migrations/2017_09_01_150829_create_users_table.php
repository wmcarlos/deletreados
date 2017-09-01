<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('sex',['M','F','O']);
            $table->date('birthday');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('restrict');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');

            $table->string('email')->unique();
            $table->string('password');
            $table->enum('provider',['Facebook','Twitter','Gmail','Own']);
            $table->integer('provider_id')->nullable();
            $table->string('avatar',100)->nullable();

            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onUpdate('cascade')->onDelete('restrict');

            $table->integer('coins')->default(0);
            $table->enum('account_type',['free','premium'])->default('free');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('isactive',['Y','N'])->default('Y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
