<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image1')->nullable();
            $table->string('title1')->nullable();
            $table->text('desc1')->nullable();
            $table->string('image2')->nullable();
            $table->string('title2')->nullable();
            $table->text('desc2')->nullable();
            $table->string('image3')->nullable();
            $table->string('title3')->nullable();
            $table->text('desc3')->nullable();
            $table->string('status')->nullable();
   
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
        Schema::dropIfExists('sliders');
    }
}
