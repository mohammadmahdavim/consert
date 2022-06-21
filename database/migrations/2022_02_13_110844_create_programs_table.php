<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('director')->nullable();
            $table->string('period')->nullable();
            $table->string('time')->nullable();
            $table->string('textTicket')->nullable();
            $table->string('publish')->nullable();
            $table->string('start')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('control_program', function (Blueprint $table) {

            $table->bigInteger('control_id')->unsigned();
            $table->foreign('control_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            $table->primary(['control_id' , 'program_id']);
        });

        Schema::create('organizer_program', function (Blueprint $table) {

            $table->bigInteger('organizer_id')->unsigned();
            $table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            $table->primary(['organizer_id' , 'program_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
        Schema::dropIfExists('organizer_program');
        Schema::dropIfExists('control_program');

    }
}
