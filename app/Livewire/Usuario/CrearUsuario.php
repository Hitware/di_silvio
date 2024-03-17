<?php

namespace App\Livewire\Usuario;
use LivewireUI\Modal\ModalComponent;

use Livewire\Component;
use Livewire\WithFileUploads; // Asegúrate de importar el trait
use App\Models\User;

class CrearUsuario extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public function render()
    {
        return view('livewire.usuario.crear-usuario');
    }

}
