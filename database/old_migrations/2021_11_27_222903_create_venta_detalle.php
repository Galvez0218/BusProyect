<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('id_viaje_detalle');
            $table->integer('dni_usuario');
            $table->boolean('pagado');
            $table->string('metodo_pago', 25);
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
        Schema::dropIfExists('venta_detalle');
    }
}
