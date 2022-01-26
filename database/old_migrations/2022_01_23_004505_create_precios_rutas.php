<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosRutas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('precios_rutas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_origen');
            $table->integer('id_destino');
            $table->decimal('precio', $precision = 6, $scale = 2);
            $table->time('hora_salida', $precision = 0);
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
        Schema::dropIfExists('precios_rutas');
    }
}
