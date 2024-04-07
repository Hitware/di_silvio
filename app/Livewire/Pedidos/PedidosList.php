<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Sede;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class PedidosList extends Component
{

    public $orden;
    public $id_pedido;
    
    public $proveedores;
    public $proveedor = [];
    public $estados = [];

    public function render()
    {
        $this->proveedores=User::join('colaboradores','users.identificacion','=','colaboradores.identificacion')
        ->where('users.rol','=',6)
        ->select('colaboradores.*')
        ->get();

        $pedidos = Pedido::join('sedes', 'pedido.id_sede', '=', 'sedes.id')
            ->join('users', 'pedido.id_solicitante', '=', 'users.id')
            ->leftJoin('colaboradores', 'pedido.id_proveedor', '=', 'colaboradores.id')
            ->select('sedes.nombre_sede', 'pedido.*', 'users.name', DB::raw('COALESCE(colaboradores.nombres, "Sin Definir") as nombres_proveedor'))
            ->distinct()
            ->get();
        

        return view('livewire.pedidos.pedidos-list', array(
            'pedidos' => $pedidos
        ));
    }

    public function descargarDocumento($ruta,$nombreDocumento)
    {
        $rutaDocumento = storage_path("app/{$ruta}/{$nombreDocumento}");

        return response()->download($rutaDocumento);
    }

    public function actualizarProveedor($pedidoID)
    {
        $pedido = Pedido::find($pedidoID);

        if ($pedido) {
            $pedido->id_proveedor = $this->proveedor[$pedidoID];
            $pedido->save();
        }
    }

    public function actualizarEstado($pedidoID)
    {
        $pedido = Pedido::find($pedidoID);

        if ($pedido) {
            $pedido->estado = $this->estados[$pedidoID];
            $pedido->save();
        }
    }

    public function cargarFactura($id)
    {
        $this->id_pedido=$id;
        return view('livewire.pedidos.cargar-factura');
    }

    public function cleanFilter()
    {
        $this->orden = "";
    }
}
