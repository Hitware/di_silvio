<?php

namespace App\Livewire\Insumo;

use Livewire\Component;
use App\Models\Insumo;

class InsumoList extends Component
{
    public $insumo;
    
    public function render()
    {
        
        $insumo = Insumo::orderBy('created_at','desc');;

        if($this->insumo!=''){
            $insumo->where('nombre','like','%'.$this->insumo.'%');
        }

        $insumos=$insumo->paginate(10);

        return view('livewire.insumo.insumo-list',array(
            'insumos'=>$insumos
        ));
    }

    public function cleanFilter(){
        $this->insumo="";
    }
}
