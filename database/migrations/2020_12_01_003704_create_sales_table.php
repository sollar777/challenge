<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('clients_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('user_id');

            
            $table->string('obs')->nullable();
            $table->date('date');
            $table->decimal('discount', 10, 2);
            $table->bit('salvo');
            $table->bit('cancelado');

            $table->foreign('clients_id')->references('id')->on('clients');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('sales');
    }
}
