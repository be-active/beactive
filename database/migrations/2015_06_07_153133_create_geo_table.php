<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note');
			$table->string('start');
			$table->string('stop');
			$table->float('distance')->default(0);
            $table->unsignedInteger('user_id');
            $table->float('calories')->default(0);
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
           Schema::drop('geo');
    }
}
