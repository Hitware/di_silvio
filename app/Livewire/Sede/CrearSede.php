<?php

namespace App\Livewire\Sede;

use LivewireUI\Modal\ModalComponent;
use App\Models\Sede;

class CrearSede extends ModalComponent
{

    public $sede;

    public $nombre_sede;
    public $direccion_sede;
    public $telefono_sede;
    public $nombre_encargado;

    public function render()
    {
        return view('livewire.sede.crear-sede');
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'nombre_sede'=>'required',
        'direccion_sede'=>'required',
        'telefono_sede'=>'required',
        'nombre_encargado'=>'required',
    ];

    public function submit(){

       
        $this->validate();

        if($this->sede){
            $this->sede->update([
                'nombre_sede'=>$this->nombre_sede,
                'direccion_sede'=>$this->direccion_sede,
                'telefono_sede'=>$this->telefono_sede,
                'nombre_encargado'=>$this->nombre_encargado,
                'estado_sede'=>1,
            ]);
            $message="Usuario actualizado exitosamente";

        }else{
            Sede::create([
                'nombre_sede'=>$this->nombre_sede,
                'direccion_sede'=>$this->direccion_sede,
                'telefono_sede'=>$this->telefono_sede,
                'nombre_encargado'=>$this->nombre_encargado,
                'estado_sede'=>1,
            ]);
            $message="Sede creada exitosamente";
        }
        $this->sede ="";
        session()->flash('message',$message);
        return redirect()->route('ver-sedes');

    }

    
}
