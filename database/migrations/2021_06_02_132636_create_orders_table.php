<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('username_id');
            $table->string('prowoner_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('price');
            $table->string('servicecost')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('subdistrict_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
            $table->longText('addressC')->nullable();
            $table->longText('addressU')->nullable();
            $table->string('status')->nullable();
            $table->string('product_name')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment')->nullable();
            $table->string('quantity')->nullable();
            $table->bigInteger('total')->nullable();
            $table->string('sku')->nullable();
            $table->softDeletes();
            $table->foreign('username_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')
            ->onDelete('cascade');
            $table->foreign('subdistrict_id')->references('id')->on('sub__districts')
            ->onDelete('cascade');
            $table->foreign('union_id')->references('id')->on('unions')
            ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade');
    
    
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
        Schema::dropIfExists('orders');
    }
}
