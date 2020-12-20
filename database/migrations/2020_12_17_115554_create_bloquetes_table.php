<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloquetes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("sales_id");

            $table->integer("pagamento_id");
            $table->string("description");
            $table->decimal("valor_parcela", 10, 2);

            $table->foreign("sales_id")->references("id")->on("sales")->onDelete("CASCADE");

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
        Schema::dropIfExists('bloquetes');
    }
}
