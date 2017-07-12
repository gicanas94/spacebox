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
          $table->string('username', 30)->unique();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('s_question', 45);
          $table->string('s_answer', 45);
          $table->char('site_lang', 2);
          $table->integer('privileges')->default(1);
          $table->integer('active')->default(1);
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
