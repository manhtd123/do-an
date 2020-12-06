<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->integer('customer_id');
            $table->integer('status');
            $table->integer('user_id');
            $table->integer('booking_id');
            $table->integer('paymented');
            $table->string('info')->nullable();
            $table->SoftDeletes();
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
        Schema::dropIfExists('bill_tables');
    }
}
