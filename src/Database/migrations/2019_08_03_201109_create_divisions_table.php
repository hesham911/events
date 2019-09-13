<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
                $table->foreign('country_id')->references('id')->on('countries');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('divisions');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
