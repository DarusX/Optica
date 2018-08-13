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

            $table->double('od_axis')->default(0);
            $table->double('od_cylinder')->default(0);
            $table->double('od_sphere')->default(0);
            
            $table->double('os_axis')->default(0);
            $table->double('os_cylinder')->default(0);
            $table->double('os_sphere')->default(0);
            
            $table->double('ou_axis')->default(0);
            $table->double('ou_cylinder')->default(0);
            $table->double('ou_sphere')->default(0);

            $table->double('addition')->default(0);
            $table->double('alt')->default(0);
            $table->double('pupilary_distance')->default(0);

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
