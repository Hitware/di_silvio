<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads; // Asegúrate de importar el trait
use App\Models\User;
use App\Models\Colaborador;
use App\Models\Sede;
use App\Models\Pedido;
use Illuminate\Support\Arr;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class CargarPedido extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public $pedido;

    public $naturaleza;
    public $sede;
    public $orden_servicio;
    public $id_solicitante;

    public function render()
    {
        $roles =[6];    
        $sedes = Sede::get();
        $proveedor = Colaborador::join('users','colaboradores.identificacion','=','users.identificacion')
        ->select('colaboradores.*','users.email','users.rol')
        ->orderBy('created_at','desc');
        $proveedores=$proveedor->whereIn('users.rol',$roles)->get();

        return view('livewire.pedidos.cargar-pedido',array(
            'proveedores'=>$proveedores,
            'sedes'=>$sedes
        ));
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'naturaleza'=>'required',
        'sede'=>'required',
        'orden_servicio'=>'required'
    ];

    public function submit(){

        $this->validate(); 

        $this->id_solicitante = getIdSolicitante();

        $nombre_zip_orden=null;

        if ($this->orden_servicio) {
            $zip = new ZipArchive;
            $nombre_zip_orden = 'orden' . time() . '.zip';
            $ruta_zip = storage_path('app/ordenes_servicio_compra/' . $nombre_zip_orden);
            if ($zip->open($ruta_zip, ZipArchive::CREATE) === TRUE) {
                foreach ($this->orden_servicio as $orden_servicio) {
                    $nombre_archivo_orden = $orden_servicio->getClientOriginalName();
                    $ruta_archivo_temporal = $orden_servicio->getRealPath();
                    $zip->addFile($ruta_archivo_temporal, $nombre_archivo_orden);
                }
                $zip->close();
                Storage::move($nombre_zip_orden, 'ordenes_servicio_compra/' . $nombre_zip_orden);
            }
        }
        Pedido::create([
            'naturaleza'=>$this->naturaleza,
            'id_solicitante'=>$this->id_solicitante,
            'id_sede'=>$this->sede,
            'estado'=>0,
            'orden_compra'=>$nombre_zip_orden,
            'valor_factura'=>0,
        ]);
        
        return redirect()->route('ver-pedidos');

    }

}
