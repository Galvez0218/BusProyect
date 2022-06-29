<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Asiento extends Model
{
    use HasFactory;
    protected $table = 'asientos';
    protected $primaryKey = "id";

    protected $fillable = [
        'id_minivan',
        'asiento',
    ];  
}