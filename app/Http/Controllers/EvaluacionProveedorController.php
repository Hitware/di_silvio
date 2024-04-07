<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionProveedorController extends Controller
{
    public function index()
    {
        return view('evaluacion_proveedor.index');
    }
}
