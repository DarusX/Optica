<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('od_axis')->nullable();
            $table->tinyInteger('od_cylinder')->nullable();
            $table->tinyInteger('od_sphere')->nullable();
            
            $table->tinyInteger('os_axis')->nullable();
            $table->tinyInteger('os_cylinder')->nullable();
            $table->tinyInteger('os_sphere')->nullable();
            
            $table->tinyInteger('ou_axis')->nullable();
            $table->tinyInteger('ou_cylinder')->nullable();
            $table->tinyInteger('ou_sphere')->nullable();

            $table->tinyInteger('addition')->nullable();
            $table->tinyInteger('alt')->nullable();
            $table->tinyInteger('pupilary_distance')->nullable();

            $table->integer('patient_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('created_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
