<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('username_id');
            $table->string('fname');
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
             $table->string('email')->unique();
             $table->string('shopname')->nullable();
             $table->string('cat_group')->nullable();
             $table->string('phone')->nullable();
             $table->text('address')->nullable();
             $table->foreign('username_id')->references('id')->on('users')
             ->onDelete('cascade');
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
        Schema::dropIfExists('supplier_profiles');
    }
}
