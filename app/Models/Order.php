<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $table = 'pagadorder';
    protected $primaryKey = "id";

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'payment_mode',
        'payment_mode',
        'precio_total',
        'payment_id'
    ];  
}