@extends('layouts/contentNavbarLayout')

@section('title', 'Empleados - Editar datos')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<script>

  const getAreas = async () => {
    let empresa = document.querySelector('#empresa');
    let areas = document.querySelector('#areas');

    //obtener areas  por empresa seleccionada
    let url = "{{route('mostrar-areas', ':empresa')}}";
    url = url.replace(':empresa', empresa.value);
    let areasEmpresa = await fetch(url).then(response => response.json());

    let options = document.querySelectorAll('#areas option');
    options.forEach(o => o.remove());

    //llenar select con options por area
    for (const [key, value] of Object.entries(areasEmpresa)) {
      let option = document.createElement('option');
      option.value = key;
      option.innerHTML = value;
      areas.appendChild(option);
    }
  }

  const getPuestos = async () =>{

    let empresa = document.querySelector('#empresa');
    let areas = document.querySelector('#areas');
    let puestos = document.querySelector('#puesto');

    //obtener puestos por areas seleccionada
    let url = "{{route('mostrar-puestos', ':areas')}}";
    url = url.replace(':areas', areas.value);
    let areasPuestos = await fetch(url, { body: {
        empresa, areas
    }}).then(response => response.json());

    let optionsPuesto = document.querySelectorAll('#puesto option');
    optionsPuesto.forEach(o => o.remove());

    //llenar select con options por puesto
    for (const [key, value] of Object.entries(areasPuestos)) {
      let option = document.createElement('option');
      option.value = key;
      option.innerHTML = value;
      puestos.appendChild(option);
    }

  }

</script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Empleados/</span> Editar datos
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Datos del Empleado</h5>
      <!-- Account -->
      <hr class="my-0">
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">Nombres</label>
              <input class="form-control" type="text" id="firstName" name="firstName" value="{{$empleado->nombre}}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Apellido Paterno</label>
              <input class="form-control" type="text" name="lastName" id="lastName" value="{{$empleado->ape_pat}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Apellido Materno</label>
              <input class="form-control" type="text" name="lastName" id="lastName" value="{{$empleado->ape_mat}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input class="form-control" type="text" id="email" name="email" value="{{$empleado->email}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">N° de celular</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">PE (+51)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{$empleado->celular}}" />
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">N° de Teléfono</label>
              <input type="text" class="form-control" id="address" name="address" value="{{$empleado->telefono}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="state" class="form-label">Dirección</label>
              <input class="form-control" type="text" id="state" name="state" value="{{$empleado->direccion}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Empresa</label>
              <select id="empresa" onchange="getAreas()" class="select2 form-select">
                @foreach ( $empresas as $empresa)
                <option value="{{$empresa->id}}" @selected($empresa->id == $empleado->empresa_id)>{{$empresa->razon_social}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Área</label>
              <select id="areas" onchange="getPuestos()" class="select2 form-select">
                @foreach ( $areas as $area)
                <option value="{{$area->id}}" @selected($area->id == $empleado->area_id)>{{$area->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Puesto</label>
              <select id="puesto" class="select2 form-select">
                @foreach ( $puestos as  $puesto)
                <option value="{{$puesto->id}}" @selected($puesto->id == $empleado->puesto_id)>{{$puesto->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Tipo de Documento</label>
              <select id="timeZones" class="select2 form-select">
                <option value="">Select Timezone</option>
                <option value="-12">(GMT-12:00) International Date Line West</option>
                <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                <option value="-10">(GMT-10:00) Hawaii</option>
                <option value="-9">(GMT-09:00) Alaska</option>
                <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                <option value="-7">(GMT-07:00) Arizona</option>
                <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                <option value="-6">(GMT-06:00) Central America</option>
                <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                <option value="-6">(GMT-06:00) Saskatchewan</option>
                <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                <option value="-5">(GMT-05:00) Indiana (East)</option>
                <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                <option value="-4">(GMT-04:00) Caracas, La Paz</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Nro de Documento</label>
              <input class="form-control" type="text" id="nro_doc" name="nro_doc" value="{{$empleado->nro_doc}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Estado Civil</label>
              <select id="currency" class="select2 form-select">
                @foreach ( $est_civil as $est_civi)
                <option value="{{$est_civi->id}}" @selected($est_civi->id == $empleado->esta_civiles)>{{$est_civi->descripcion}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Fecha de Ingreso</label>
                <input class="form-control" type="date" value="{{$empleado->fecha_ingreso}}" />
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
            <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
@endsection
