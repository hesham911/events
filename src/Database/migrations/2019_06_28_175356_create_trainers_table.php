<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');

            //> basic info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('num_phone')->nullable();
            $table->integer('work_num_phone')->nullable();

            //> social links
            $table->string('url_fb')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('url_linked_in')->nullable();

            //> file of cv trainers
            $table->string('portfolio')->nullable();
            $table->string('filed')->nullable();
            $table->tinyInteger('block')->default(0);

            //> good bad or block
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('trainers');
    }
}
