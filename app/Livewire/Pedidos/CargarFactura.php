<?php

namespace App\Livewire\Pedidos;
use Livewire\WithFileUploads; // Asegúrate de importar el trait

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Pedido;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class CargarFactura extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public $id_pedido;
    public $pedido;

    public $factura;
    public $valor_factura;

    public function render()
    {
        return view('livewire.pedidos.cargar-factura');
    }

    public function mount($id_pedido){
        $id_pedido = $this->id_pedido;
        $this->pedido = Pedido::find($id_pedido);
    }

    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'factura'=>'required',
        'valor_factura'=>'required'
    ];

    public function submit(){
       
        if($this->pedido){
            
            $nombre_zip_factura=null;

            if ($this->factura) {
                $zip = new ZipArchive;
                $nombre_zip_factura = 'factura' . time() . '.zip';
                $ruta_zip = storage_path('app/facturas/' . $nombre_zip_factura);
                if ($zip->open($ruta_zip, ZipArchive::CREATE) === TRUE) {
                    foreach ($this->factura as $factura) {
                        $nombre_archivo_factura = $factura->getClientOriginalName();
                        $ruta_archivo_temporal = $factura->getRealPath();
                        $zip->addFile($ruta_archivo_temporal, $nombre_archivo_factura);
                    }
                    $zip->close();
                    Storage::move($nombre_zip_factura, 'facturas/' . $nombre_zip_factura);
                }
            }

            $this->pedido->update([
                'factura' => $nombre_zip_factura,
                'valor_factura' => $this->valor_factura,
            ]);

        }
        

    }
}
