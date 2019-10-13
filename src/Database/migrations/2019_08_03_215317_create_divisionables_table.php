<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * make map to relation in serverProvides between countrable_id and division
     * @return void
     */
    public function up()
    {
        Schema::create('divisionables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id');
            $table->integer('divisionables_id');
            $table->string('divisionables_type');
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
        Schema::dropIfExists('divisionables');
    }
}
