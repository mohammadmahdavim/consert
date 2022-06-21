<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneChairRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_chair_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salon_id');
            $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
            $table->unsignedBigInteger('plane_salon_id');
            $table->foreign('plane_salon_id')->references('id')->on('plane_salons')->onDelete('cascade');
            $table->integer('name');
            $table->integer('row');
            $table->integer('start');
            $table->integer('count');
            $table->softDeletes();
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
        Schema::dropIfExists('plane_chair_rows');
    }
}
