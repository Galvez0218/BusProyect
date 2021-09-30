<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Origen extends Model
{
    use HasFactory;
    protected $table = 'origenes';
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre_origen',
        'direcion',
    ];  
}