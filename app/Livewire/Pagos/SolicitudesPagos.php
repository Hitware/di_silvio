<?php

namespace App\Livewire\Pagos;
use App\Models\SolicitudPago;

use Livewire\Component;

class SolicitudesPagos extends Component
{

    public $solicitud_pago;


    public function render()
    {
        $this->solicitud_pago = SolicitudPago::leftjoin('servicio','solicitud_pago.id_servicio','=','servicio.id')
        ->leftjoin('colaboradores','servicio.id_proveedor','colaboradores.id')
        ->select('servicio.*','solicitud_pago.valor_pago','solicitud_pago.estado_pago','solicitud_pago.archivo_solicitud_pago','solicitud_pago.archivo_evidencias','colaboradores.nombres')
        ->get();
        return view('livewire.pagos.solicitudes-pagos',array(
            'solicitudes'=>$this->solicitud_pago
        ));
    }

    public function descargarDocumento($carpeta,$nombreDocumento)
    {
        $rutaDocumento = storage_path("app/{$carpeta}/{$nombreDocumento}");

        return response()->download($rutaDocumento);
    }
}
