<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->text('frame');
            $table->text('notes')->nullable();
            $table->double('total');
            $table->integer('material_id')->unsigned();
            $table->integer('exam_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->boolean('paid')->default(0);
            $table->enum('status', ['Preparando', 'Listo', 'Entregado'])->default('Preparando');
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
