<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return view('servicio.index');
    }

    public function verSolicitudes()
    {
        return view('servicio.ver-solicitudes');
    }

    public function verSolicitados()
    {
        return view('servicio.servicios-requeridos');
    }
}
