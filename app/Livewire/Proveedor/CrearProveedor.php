<?php

namespace App\Livewire\Proveedor;
use LivewireUI\Modal\ModalComponent;

use Livewire\Component;
use Livewire\WithFileUploads; // Asegúrate de importar el trait
use App\Models\User;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Hash;

class CrearProveedor extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public $proveedor;

    public $nombres;
    public $apellidos;
    public $identificacion;
    public $telefono;
    public $correo;
    public $direccion;
    public $referencia_bancaria;
    public $rut;
    public $rol;

    public function render()
    {
        return view('livewire.proveedor.crear-proveedor');
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'nombres'=>'required',
        'identificacion'=>'required',
        'telefono'=>'required',
        'correo'=>'required',
        'direccion'=>'required',
        'referencia_bancaria'=>'required',
        'rut'=>'required',
    ];

    public function submit(){

       
        $this->validate();

        if($this->proveedor){
          
            $message="Proveedor actualizado exitosamente";

        }else{
            $clave = Hash::make($this->identificacion);
            User::create([
                'identificacion'=>$this->identificacion,
                'name'=>$this->nombres,
                'lastname'=>'',
                'telefono'=>$this->telefono,
                'email'=>$this->correo,
                'rol'=>6,
                'password'=>$clave,
            ]);

            $ruta_rut = null;
            if ($this->rut) {
                $ruta_rut = $this->rut->storeAs('rut', time() . '.' . $this->rut->getClientOriginalExtension());
            }

            $ruta_referencia_bancaria = null;
            if ($this->rut) {
                $ruta_referencia_bancaria = $this->referencia_bancaria->storeAs('referencia_bancaria', time() . '.' . $this->referencia_bancaria->getClientOriginalExtension());
            }

            Colaborador::create([
                'identificacion'=>$this->identificacion,
                'nombres'=>$this->nombres,
                'apellidos'=>'',
                'telefono'=>$this->telefono,
                'direccion'=>$this->direccion,
                'rut'=>$ruta_rut,
                'referencia_bancaria'=>$ruta_referencia_bancaria,
                'estado'=>'1',
            ]);
            $message="Sede creada exitosamente";
        }
        $this->proveedor ="";
        session()->flash('message',$message);
        return redirect()->route('ver-proveedor');

    }

}
