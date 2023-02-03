<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
  public function empleados(){
    $empleados = Empleados::all();

    return view('content.pages.empleados', ['empleados' => $empleados]);

  }

}
