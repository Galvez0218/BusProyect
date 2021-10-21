<?php

namespace App\Models\Permisos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permisos';
    protected $primaryKey = "id";

    protected $fillable = [
        'modulo', 
        'area',
    ];  
}