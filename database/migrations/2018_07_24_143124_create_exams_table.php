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

            $table->double('od_axis')->nullable();
            $table->double('od_cylinder')->nullable();
            $table->double('od_sphere')->nullable();
            
            $table->double('os_axis')->nullable();
            $table->double('os_cylinder')->nullable();
            $table->double('os_sphere')->nullable();
            
            $table->double('ou_axis')->nullable();
            $table->double('ou_cylinder')->nullable();
            $table->double('ou_sphere')->nullable();

            $table->double('addition')->nullable();
            $table->double('alt')->nullable();
            $table->double('pupilary_distance')->nullable();

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
