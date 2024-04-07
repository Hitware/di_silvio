<?php

namespace App\Livewire\Servicio;

use LivewireUI\Modal\ModalComponent;
use App\Models\Colaborador;
use App\Models\Servicio;
use App\Models\Sede;

class PedirServicio extends ModalComponent
{

    public $servicio;

    public $novedad;
    public $prioridad;
    public $descripcion_solicitud;
    public $id_proveedor;
    public $id_sede;

    public function render()
    {
        $roles =[6];

        $colaborador = Colaborador::join('users','colaboradores.identificacion','=','users.identificacion')
        ->select('colaboradores.*','users.email','users.rol')
        ->orderBy('created_at','desc');
        $colaboradores=$colaborador->whereIn('users.rol',$roles)->get();

        $sedes = Sede::orderBy('created_at','desc')->get();

        return view('livewire.servicio.pedir-servicio',array(
            'proveedor'=>$colaboradores,
            'sedes'=>$sedes
        ));
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'novedad'=>'required',
        'prioridad'=>'required',
        'descripcion_solicitud'=>'required',
        'id_sede'=>'required',
    ];


    public function submit(){

       
        $this->validate();

        $id_usuario = auth()->user()->id;

        Servicio::create([
            'novedad'=>$this->novedad,
            'prioridad'=>$this->prioridad,
            'descripcion_servicio'=>$this->descripcion_solicitud,
            'id_solicitante'=>$id_usuario,
            'id_proveedor'=>$this->id_proveedor,
            'id_sede'=>$this->id_sede,
            'estado'=>1,
        ]);

          
        $this->servicio ="";
        
        $rol =auth()->user()->rol;
        if($rol>1 & $rol<=5){
            return redirect()->route('ver-solicitudes');
        }
        else{
            return redirect()->route('ver-servicios');
        }

    }
}
