<?php

namespace App\Livewire\Servicio;

use Livewire\Component;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use App\Models\Colaborador;
use App\Models\SolicitudPago;
use App\Models\Servicio;
use App\Models\Sede;
use Livewire\WithFileUploads; // Asegúrate de importar el trait
use LivewireUI\Modal\ModalComponent;

class SolicitarPago extends ModalComponent
{
    use WithFileUploads; // Agrega el trait a tu componente

    public $id;

    public $sedes;

    public $descripcion_solicitud;
    public $id_sede;
    public $archivo;
    public $evidencias;
    public $valor_pago;


    protected $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    protected $rules=[
        'archivo'=>'required',
        'evidencias'=>'required',
        'valor_pago'=>'required',
    ];

    public function render()
    {
        $this->sedes=Sede::get();

        return view('livewire.servicio.solicitar-pago',array(
            'sedes'=>$this->sedes
        ));
        
    }

    public function submit(){
        $id_proveedor = auth()->user()->id;

        $nombre_zip_cuenta=null;
        $nombre_zip_evidencias=null;
        if ($this->archivo) {
            $zip = new ZipArchive;
            $nombre_zip_cuenta = 'archivos_cuenta_' . time() . '.zip';
            $ruta_zip = storage_path('app/archivos_cuenta/' . $nombre_zip_cuenta);
            if ($zip->open($ruta_zip, ZipArchive::CREATE) === TRUE) {
                foreach ($this->archivo as $archivo) {
                    $nombre_archivo_cuenta = $archivo->getClientOriginalName();
                    $ruta_archivo_temporal = $archivo->getRealPath();
                    $zip->addFile($ruta_archivo_temporal, $nombre_archivo_cuenta);
                }
                $zip->close();
                Storage::move($nombre_zip_cuenta, 'archivos_cuenta/' . $nombre_zip_cuenta);
            }
        }

        if ($this->evidencias) {
            $zip = new ZipArchive;
            $nombre_zip_evidencias = 'evidencias' . time() . '.zip';
            $ruta_zip = storage_path('app/evidencias/' . $nombre_zip_evidencias);
            if ($zip->open($ruta_zip, ZipArchive::CREATE) === TRUE) {
                foreach ($this->evidencias as $evidencia) {
                    $nombre_archivo_evidencias = $evidencia->getClientOriginalName();
                    $ruta_archivo_temporal = $evidencia->getRealPath();
                    $zip->addFile($ruta_archivo_temporal, $nombre_archivo_evidencias);
                }
                $zip->close();
                Storage::move($nombre_zip_evidencias, 'evidencias/' . $nombre_zip_evidencias);
            }
        }

        if(empty($this->id)){

            Servicio::create([
                'novedad'=>$this->descripcion_solicitud,
                'prioridad'=>2,
                'descripcion_servicio'=>$this->descripcion_solicitud,
                'id_solicitante'=>1,
                'id_proveedor'=>$id_proveedor,
                'id_sede'=>$this->id_sede,
                'estado'=>5,
            ]);

            SolicitudPago::create([
                'descripcion_servicio'=>$this->descripcion_solicitud,
                'archivo_solicitud_pago'=>$nombre_zip_cuenta,
                'archivo_evidencias'=>$nombre_zip_evidencias,
                'id_servicio'=>'0',
                'estado_pago'=>1,
                'id_proveedor'=>$id_proveedor,
                'id_sede'=>$this->id_sede,
                'valor_pago'=>$this->valor_pago
            ]);

        }
        else{

            $servicio=Servicio::find($this->id);
            $id_sede = $servicio->id_sede;
            $descripcion_servicio = $servicio->descripcion_servicio;
            $id_proveedor = $servicio->id_proveedor;

            SolicitudPago::create([
                'descripcion_servicio'=>$descripcion_servicio,
                'archivo_solicitud_pago'=>$nombre_zip_cuenta,
                'archivo_evidencias'=>$nombre_zip_evidencias,
                'id_servicio'=>$this->id,
                'estado_pago'=>1,
                'id_proveedor'=>$id_proveedor,
                'id_sede'=>$id_sede,
                'valor_pago'=>$this->valor_pago
            ]);

           
        }
        return redirect()->route('ver-servicios-requeridos');


    }

}
