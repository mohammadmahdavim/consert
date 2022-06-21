<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_chairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salon_id');
            $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
            $table->unsignedBigInteger('plane_salon_id');
            $table->foreign('plane_salon_id')->references('id')->on('plane_salons')->onDelete('cascade');
            $table->unsignedBigInteger('plane_chair_row_id');
            $table->foreign('plane_chair_row_id')->references('id')->on('plane_chair_rows')->onDelete('cascade');
            $table->integer('name');
            $table->string('status');
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
        Schema::dropIfExists('plane_chairs');
    }
}
