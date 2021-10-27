<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reclamo extends Model
{
    use HasFactory;
    protected $table = 'reclamos';
    protected $primaryKey = "id";

    protected $fillable = [
        'reclamos',
        'dni',
    ];  
}