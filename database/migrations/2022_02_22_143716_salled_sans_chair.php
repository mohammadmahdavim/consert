<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalledSansChair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salled_sans_chair', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('salled_id')->unsigned();
            $table->foreign('salled_id')->references('id')->on('salleds')->onDelete('cascade');
            $table->bigInteger('sans_chair_id')->unsigned();
            $table->foreign('sans_chair_id')->references('id')->on('sans_chairs')->onDelete('cascade');
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
        //
    }
}
