<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    use HasFactory;

    protected $table = 'servicio';

    protected $fillable = [
        'novedad',
        'descripcion_servicio',
        'id_solicitante',
        'id_proveedor',
        'id_sede',
        'prioridad',
        'estado',
    ];
}
