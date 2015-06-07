<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
   // create migration: new table named geo
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->boolean('complete')->default(false);
            $table->timestamps();
        });
    }


    // Reverse the migration: drop the table
    public function down()
    {
        Schema::drop('todos');
    }
}
