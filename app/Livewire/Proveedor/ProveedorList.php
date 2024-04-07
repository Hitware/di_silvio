<?php

namespace App\Livewire\Proveedor;
use App\Models\Colaborador;

use Livewire\Component;

class ProveedorList extends Component
{
    public $proveedor;

    public function render()
    {
        prueba();
        $roles =[6];
   
        $proveedor = Colaborador::join('users','colaboradores.identificacion','=','users.identificacion')
        ->select('colaboradores.*','users.email','users.rol')
        ->orderBy('created_at','desc');

        if($this->proveedor!=''){
            $proveedor->where('nombres','like','%'.$this->proveedor.'%');
        }

        $proveedores=$proveedor->whereIn('users.rol',$roles)->get();


        return view('livewire.proveedor.proveedor-list',array(
            'proveedores'=>$proveedores
        ));

    }


    public function descargarDocumento($nombreDocumento)
    {
        $rutaDocumento = storage_path("app/{$nombreDocumento}");

        return response()->download($rutaDocumento);
    }

    public function cleanFilter(){
        $this->proveedor="";
    }
}
