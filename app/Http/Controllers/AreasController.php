<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreasController extends Controller
{
  public function mostrarPuestos(Area $area, Request $request)
  {
    $puestos = $area->puestos()->where('empresa_id', $request->empresa)->pluck('nombre', 'id');
    
    echo $puestos;
  }
}
