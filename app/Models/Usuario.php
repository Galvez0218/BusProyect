<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = "id";

    protected $fillable = [
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'dni',
        'clave',
        'totalPago',
        'pagado',
        'id_viaje',
    ];  
}
