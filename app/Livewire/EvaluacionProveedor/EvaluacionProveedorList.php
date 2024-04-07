<?php

namespace App\Livewire\EvaluacionProveedor;

use Livewire\Component;
use App\Models\Servicio;

class EvaluacionProveedorList extends Component
{
    public $proveedor;
    public $servicio;

    public function render()
    {
        $this->servicio = Servicio::join('sedes','servicio.id_sede','=','sedes.id')
        ->join('users','servicio.id_solicitante','=','users.id')
        ->leftjoin('colaboradores','servicio.id_proveedor','=','colaboradores.id')
        ->select('servicio.*','colaboradores.nombres as nombre_proveedor','colaboradores.identificacion','sedes.nombre_sede','users.name as nombre_solicitante')
        ->get();

        return view('livewire.evaluacion-proveedor.evaluacion-proveedor-list',array(
            'servicios'=>$this->servicio,
        ));
    
    }

    public function cleanFilter()
    {
        $this->proveedor = "";
    }
}
