<?php

namespace App\Livewire\Usuario;
use LivewireUI\Modal\ModalComponent;

use Livewire\Component;
use Livewire\WithFileUploads; // Asegúrate de importar el trait
use App\Models\User;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Hash;

class CrearUsuario extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public $usuario;

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
        return view('livewire.usuario.crear-usuario');
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'nombres'=>'required',
        'apellidos'=>'required',
        'identificacion'=>'required',
        'telefono'=>'required',
        'correo'=>'required',
        'direccion'=>'required',
        'referencia_bancaria'=>'required',
        'rut'=>'required',
        'rol'=>'required',
    ];

    public function submit(){

       
        $this->validate();

        if($this->usuario){
          
            $message="Usuario actualizado exitosamente";

        }else{
            $clave = Hash::make($this->identificacion);
            User::create([
                'identificacion'=>$this->identificacion,
                'name'=>$this->nombres,
                'lastname'=>$this->apellidos,
                'telefono'=>$this->telefono,
                'email'=>$this->correo,
                'rol'=>$this->rol,
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
                'apellidos'=>$this->apellidos,
                'telefono'=>$this->telefono,
                'direccion'=>$this->direccion,
                'rut'=>$ruta_rut,
                'referencia_bancaria'=>$ruta_referencia_bancaria,
                'estado'=>'1',
            ]);
            $message="Sede creada exitosamente";
        }
        $this->usuario ="";
        session()->flash('message',$message);
        return redirect()->route('ver-usuarios');

    }

}
