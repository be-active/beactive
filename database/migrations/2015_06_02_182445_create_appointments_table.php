<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{

    // Run the migrations.
    public function up()
    {
       Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('user_id');
			$table->datetime('start');
			$table->datetime('end');
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }


	//Reverse the migrations.
    public function down()
    {
        Schema::drop('appointments');
    }
}
