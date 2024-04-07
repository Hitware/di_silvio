<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPago extends Model
{
    use HasFactory;

    protected $table = 'solicitud_pago';

    protected $fillable = [
       'descripcion_servicio',
       'archivo_solicitud_pago',
       'archivo_evidencias',
       'estado_pago',
       'id_servicio',
       'id_proveedor',
       'valor_pago',
       'id_sede'
    ];
}
