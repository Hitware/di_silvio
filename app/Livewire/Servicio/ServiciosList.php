<?php

namespace App\Livewire\Servicio;

use Livewire\Component;

use App\Models\Colaborador;
use App\Models\Servicio;
use App\Models\Sede;
use App\Models\User;


class ServiciosList extends Component
{

    public $servicio;

    public $proveedores;
    public $estados = [];
    public $proveedor = [];



    public function render()
    {   

        $identificacion = auth()->user()->identificacion;
        $rol = auth()->user()->rol;

        $this->proveedores=User::join('colaboradores','users.identificacion','=','colaboradores.identificacion')
        ->where('users.rol','=',6)
        ->select('colaboradores.*')
        ->get();

        $this->servicio = Servicio::join('sedes','servicio.id_sede','=','sedes.id')
        ->join('users','servicio.id_solicitante','=','users.id')
        ->leftjoin('colaboradores','servicio.id_proveedor','=','colaboradores.id')
        ->select('servicio.*','colaboradores.nombres as nombre_proveedor','colaboradores.identificacion','sedes.nombre_sede','users.name as nombre_solicitante')
        ->get();
        
        if($rol==6){
            $this->servicio->where('colaboradores.identificacion','=',$identificacion);
        }

        return view('livewire.servicio.servicios-list',array(
            'servicios'=>$this->servicio,
            'rol'=>$this->proveedores
        ));
    }


    public function actualizarEstado($servicioId)
    {
        $experiencia = Servicio::find($servicioId);

        if ($experiencia) {
            $experiencia->estado = $this->estados[$servicioId];
            $experiencia->save();
        }
    }
    

    public function actualizarProveedor($servicioId)
    {
        $experiencia = Servicio::find($servicioId);

        if ($experiencia) {
            $experiencia->id_proveedor = $this->proveedor[$servicioId];
            $experiencia->save();
        }
    }
}


