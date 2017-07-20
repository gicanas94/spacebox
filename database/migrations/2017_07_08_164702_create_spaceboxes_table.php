<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaceboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaceboxes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 50);
          $table->string('slug', 50);
          $table->string('description', 200);
          $table->char('lang', 2);
          $table->char('color', 7);
          $table->integer('visible')->default(1);
          $table->integer('banned')->default(0);
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('spaceboxes');
    }
}
