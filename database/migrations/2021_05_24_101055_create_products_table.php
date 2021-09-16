<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shopname');
            $table->longText('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('fimage')->nullable();
            $table->string('image')->nullable();
            $table->string('attr')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->foreignId('inventory_id')->nullable();
            $table->double('price', 10, 2);
            $table->double('oldprice',10, 2)->nullable();
            $table->string('status')->nullable();
            $table->integer('wstatus')->nullable();
            $table->string('warrenty')->nullable();
            $table->integer('alert')->nullable();
            $table->string('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('qtytext')->nullable();
            $table->string('size')->nullable();
            $table->string('optionA')->nullable();
            $table->integer('optionB')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('username_id');
            $table->foreign('username_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('subcat_id')->references('id')->on('sub__categories')
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
        Schema::dropIfExists('products');
    }
}
