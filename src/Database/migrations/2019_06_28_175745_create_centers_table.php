<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->increments('id');

            //> basic info
            $table->string('title')->nullable();
            $table->text('logo')->nullable();
            $table->text('address')->nullable();
            $table->integer('num_phone')->nullable();

            //> links of place
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('url_fb')->nullable();
            $table->string('url_twitter')->nullable();

            //>features of centers
            $table->integer('num_class_room')->nullable();
            $table->tinyInteger('Air_conditioned_place')->default(0);


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
        Schema::dropIfExists('centers');
    }
}
