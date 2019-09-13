<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workshop_id')->unsigned();
            $table->foreign('workshop_id')->references('id')->on('workshops');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->tinyInteger('accept')->default(0);
            $table->tinyInteger('block')->default(0);
            $table->string('gender')->nullable();
            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::dropIfExists('trainees');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
