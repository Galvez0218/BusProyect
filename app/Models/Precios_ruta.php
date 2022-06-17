<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Precios_ruta extends Model
{
    use HasFactory;
    protected $table = 'precios_rutas';
    protected $primaryKey = "id";

    protected $fillable = [
        'id_origen',
        'id_destino',
        'precio',
        'hora_salida',
    ];  
}