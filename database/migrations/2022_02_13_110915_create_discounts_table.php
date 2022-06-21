<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sans_id')->unsigned();
            $table->foreign('sans_id')->references('id')->on('sans')->onDelete('cascade');
            $table->string('code');
            $table->integer('count');
            $table->integer('used');
            $table->string('type');
            $table->integer('value');
            $table->tinyInteger('active')->default(1);
            $table->integer('if');
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
        Schema::dropIfExists('discounts');
    }
}
