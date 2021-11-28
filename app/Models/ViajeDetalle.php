<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ViajeDetalle extends Model
{
    use HasFactory;
    protected $table = 'viaje_detalle';
    protected $primaryKey = "id";

    protected $fillable = [
        'id_origen',
        'id_destino',
        'precio_viaje',
        'hora_salida',
        'fecha_salida',
        'id_minivan'
    ];  
}
