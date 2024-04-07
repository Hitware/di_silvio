<?php

namespace App\Livewire\Pagos;

use Livewire\Component;
use App\Models\SolicitudPago;

class PagosSolicitados extends Component
{
    public $solicitudes;

    public function render()
    {
        $id_proveedor = auth()->user()->identificacion;

        $this->solicitudes = SolicitudPago::join('colaboradores','solicitud_pago.id_proveedor','=','colaboradores.id')
        ->select('solicitud_pago.*','colaboradores.identificacion')
        ->where('colaboradores.identificacion','=',$id_proveedor)
        ->get();

        return view('livewire.pagos.pagos-solicitados',array(
            'solicitudes'=>$this->solicitudes
        ));
    
    }

    public function descargarDocumento($carpeta,$nombreDocumento)
    {
        $rutaDocumento = storage_path("app/{$carpeta}/{$nombreDocumento}");

        return response()->download($rutaDocumento);
    }
}
