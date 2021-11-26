<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class VentaDetalle extends Model
{
    use HasFactory;
    protected $table = 'venta_detalle';
    protected $primaryKey = "id";

    protected $fillable = [
        'id_viaje_detalle',
        'dni_usuario',
        'pagado',
        'metodo_pago'
    ];  
}