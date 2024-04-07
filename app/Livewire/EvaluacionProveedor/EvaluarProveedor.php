<?php

namespace App\Livewire\EvaluacionProveedor;
use LivewireUI\Modal\ModalComponent;

use Livewire\Component;

class EvaluarProveedor extends ModalComponent
{
        /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
    public function render()
    {
        return view('livewire.evaluacion-proveedor.evaluar-proveedor');
    }
}
