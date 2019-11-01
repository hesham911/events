<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            Schema::create('workshops', function (Blueprint $table) {
                $table->increments('id');

                //> relations cols
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

                //> basic info
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->text('evaluate')->nullable();
                $table->string('volunteers')->nullable();



                //> Trainees count cols
                $table->string('Trainees_full_sheet')->nullable();
                $table->string('Trainees_accept_sheet')->nullable();
                $table->string('Trainees_band_sheet')->nullable();


                $table->integer('tickets_count')->nullable();

                $table->string('images')->nullable(); //> أعمل جدول الفايل الملفات

                $table->date('start_date')->default(Carbon::now());
                $table->date('end_date')->default(Carbon::now());
                $table->time('start_time')->default('00:00:00');
                $table->time('end_time')->default('00:00:00');
                $table->tinyInteger('active')->default(1);
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

            Schema::dropIfExists('workshops');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
