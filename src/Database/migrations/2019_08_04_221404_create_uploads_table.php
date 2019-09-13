<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');

            //> relations cols
            $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

            $table->integer('workshop_id')->unsigned();
                $table->foreign('workshop_id')->references('id')->on('workshops');

            $table->string('name');
            $table->string('type');
            $table->string('size');
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

        Schema::dropIfExists('uploads');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
