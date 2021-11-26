<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $table = 'Orders';

    protected $fillable = [
        'nombres',
        'apellidos',
        'precio',
        'dni',
        'origen',
        'destino',
        'fecha_salida'
    ];  
}