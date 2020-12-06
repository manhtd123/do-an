<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('sex')->nullable();
            $table->text('avatar')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->integer('status')->nullable();
            $table->string('info')->nullable();
            $table->integer('department_id')->nullable();
            $table->SoftDeletes();
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
