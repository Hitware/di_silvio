<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColaboradorController extends Controller
{
    
    public function getRut($filename){
        return Storage::response($filename);
    }

    public function getReferenciaBancaria($filename){
        return Storage::response($filename);
    }

}
