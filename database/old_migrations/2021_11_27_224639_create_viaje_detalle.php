<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajeDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('viaje_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('id_origen');
            $table->integer('id_destino');
            $table->decimal('precio_viaje');
            $table->string('hora_salida', 15);
            $table->string('fecha_salida', 20);
            $table->integer('id_minivan');
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
        Schema::dropIfExists('viaje_detalle');
    }
}
