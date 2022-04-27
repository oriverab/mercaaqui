<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string('img');
            $table->integer("precio");
            $table->integer("cantidad");
            $table->integer("total");
            $table->string("vendedor");
            $table->unsignedBigInteger('productos_id'); 
            $table->foreign('productos_id')->references('id')->on('productos');
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
        Schema::dropIfExists('ventas');
    }
}
