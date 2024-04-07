<?php

namespace App\Livewire\Insumo;

use LivewireUI\Modal\ModalComponent;
use App\Models\Insumo;

class CrearInsumo extends ModalComponent
{
    public $insumo;

    public $nombre;
    public $tipo_insumo;

    public function render()
    {
        return view('livewire.insumo.crear-insumo');
    }


    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'nombre'=>'required',
        'tipo_insumo'=>'required'
    ];

    public function submit(){

        $this->validate();
       
        Insumo::create([
            'nombre'=>$this->nombre,
            'tipo_insumo'=>$this->tipo_insumo
        ]);
        $message="Insumo creada exitosamente";
        
        $this->insumo ="";
        session()->flash('message',$message);
        return redirect()->route('ver-insumos');

    }
}
