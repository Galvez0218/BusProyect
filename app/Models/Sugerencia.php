<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sugerencia extends Model
{
    use HasFactory;
    protected $table = 'sugerencias';
    protected $primaryKey = "id";

    protected $fillable = [
        'sugerencia',
        'dni',
    ];  
}
