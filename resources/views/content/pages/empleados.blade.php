@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Empleados
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Lista de Empleados</h5> <input type="text" style="width: 40%" class="form-control"
      placeholder="Buscar Empleado" aria-describedby="floatingInputHelp" />
  </div>
  <div class="table-responsive text-nowrap m-3">
    <table class="table">
      <thead class="table-info">
        <tr>
          <th>Nombres Completos</th>
          <th>DNI</th>
          <th>Puesto</th>
          <th>Area</th>
          <th>Empresa</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" style="font-size:14px">
        @foreach ( $empleados as $empleado )
        <tr class="table-default text-capitalize">
          <td><i class="tf-icons bx bx-user fa-lg me-1"></i> {{$empleado->nombre}} {{$empleado->ape_pat}}
            {{$empleado->ape_mat}}</td>
          <td>{{$empleado->nro_doc}}</td>
          <td>{{$empleado->puesto->nombre}}</td>
          <td><span class="badge bg-label-primary me-1">{{$empleado->area->nombre}}</span></td>
          <td>{{$empleado->empresa->razon_social}}</td>
          <td>
            <a href="{{ route('empleado-show', $empleado->id)}}" class="btn btn-icon btn-primary">
              <span class="tf-icons bx bx-edit"></span>
            </a>
            <a href="{{ route('empleado-show', $empleado->id)}}" class="btn btn-icon btn-danger">
              <span class="tf-icons bx bx-trash"></span>
            </a>
            <!--/  <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('empleado-show', $empleado->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm justify-content-end">
        <li class="page-item prev">
          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
        </li>
        <li class="page-item">
          <a class="page-link" href="javascript:void(0);">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="javascript:void(0);">2</a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="javascript:void(0);">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="javascript:void(0);">4</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="javascript:void(0);">5</a>
        </li>
        <li class="page-item next">
          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
        </li>
      </ul>
    </nav>
  </div>

</div>

<!--/ Basic Bootstrap Table -->
@endsection