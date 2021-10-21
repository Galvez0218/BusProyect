<?php

namespace App\Models\Permisos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permisos_Usuario extends Model
{
    use HasFactory;
    protected $table = 'permisos_usuarios';
    protected $primaryKey = "id";

    protected $fillable = [
        'dni',
        'id_permiso',
    ];  
}