<?php

namespace App\Livewire\Sede;

use Livewire\Component;
use App\Models\Sede;

class SedesList extends Component
{
    public $sede;
    
    public function render()
    {
        
        $sedes = Sede::orderBy('created_at','desc');;

        if($this->sede!=''){
            $sedes->where('nombre_sede','like','%'.$this->sede.'%');
        }

        $sedes=$sedes->get();

        return view('livewire.sede.sedes-list',array(
            'sedes'=>$sedes
        ));
    }

    public function cleanFilter(){
        $this->sede="";
    }
}
