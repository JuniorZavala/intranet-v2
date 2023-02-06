<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleados;
use App\Models\Empresas;
use App\Models\Esta_civiles;
use App\Models\Puestos;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
  public function index(){

    $empleados = Empleados::with(['puesto','area','empresa'])->paginate(15);
    return view('content.pages.empleados', ['empleados' => $empleados]);

  }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleado)
    {
      $empleado->load(['puesto','area','empresa','esta_civil']);
      $empresas = Empresas::all();
      $areas = Area::where("empresa_id", $empleado->empresa_id)->get();
      $puestos = Puestos::where("empresa_id", $empleado->empresa_id)->get();
      $est_civil = Esta_civiles::all();
        return view('content.pages.edit-empleado',['empleado'=>$empleado , 'empresas' => $empresas, 'areas' => $areas, 'puestos' => $puestos, 'est_civil' => $est_civil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
