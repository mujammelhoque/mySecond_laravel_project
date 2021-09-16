<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('username')->unique();
            $table->string('access')->nullable();
            $table->string('email')->unique();
            $table->string('cat_group')->nullable();
            $table->string('phone')->nullable();
            $table->text('currentaddr')->nullable();
            $table->text('permanentaddr')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('shopname')->nullable();
            $table->string('district_id')->nullable();
            $table->string('subdist_id')->nullable();
            $table->string('union_id')->nullable();
            $table->string('optionA')->nullable();
            $table->string('is_admin')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
