<?php

namespace App\Livewire\Usuario;
use App\Models\Colaborador;

use Livewire\Component;

class UsuariosList extends Component
{
    public $colaborador;

    
    public function render()
    {
        $roles =[1,2,3,4,5];
   
        $colaborador = Colaborador::join('users','colaboradores.identificacion','=','users.identificacion')
        ->select('colaboradores.*','users.email','users.rol')
        ->orderBy('created_at','desc');;

        if($this->colaborador!=''){
            $colaborador->where('nombres','like','%'.$this->colaborador.'%');
        }

        $colaboradores=$colaborador->whereIn('users.rol',$roles)->get();


        return view('livewire.usuario.usuarios-list',array(
            'colaboradores'=>$colaboradores
        ));
    }

    public function descargarDocumento($nombreDocumento)
    {
        $rutaDocumento = storage_path("app/{$nombreDocumento}");

        return response()->download($rutaDocumento);
    }

    public function cleanFilter(){
        $this->colaborador="";
    }

}
