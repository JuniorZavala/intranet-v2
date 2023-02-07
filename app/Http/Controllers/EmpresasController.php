<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{

          /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresa)
    {
      $empresa->load(['empresa']);

        return view('content.pages.edit-empleado',['empresa'=>$empresa]);
    }

    public function mostrarAreas(Empresas $empresa)
    {
      $areas = $empresa->areas()->pluck('nombre', 'id');
      echo $areas;
    }
}
