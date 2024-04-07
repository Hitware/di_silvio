<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';

    protected $fillable = [
        'naturaleza',
        'id_solicitante',
        'id_sede',
        'orden_compra',
        'factura',
        'valor_factura',
        'estado',
    ];
}
