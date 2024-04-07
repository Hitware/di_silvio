<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Sede;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class PedidosList extends Component
{

    public $orden;
    public $id_pedido;


    public function render()
    {
        $pedidos = Pedido::join('sedes', 'pedido.id_sede', '=', 'sedes.id')
            ->join('users', 'pedido.id_solicitante', '=', 'users.id')
            ->leftJoin('colaboradores', 'pedido.id_proveedor', '=', 'colaboradores.id')
            ->select('sedes.nombre_sede', 'pedido.*', 'users.name', DB::raw('COALESCE(colaboradores.nombres, "Valor predeterminado") as nombres_proveedor'))
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
