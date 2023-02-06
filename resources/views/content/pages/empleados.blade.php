@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Dashboard /</span> Empleados
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
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
          <td><i class="tf-icons bx bx-user fa-lg me-1"></i> {{$empleado->nombre}} {{$empleado->ape_pat}} {{$empleado->ape_mat}}</td>
          <td>{{$empleado->nro_doc}}</td>
          <td>{{$empleado->puesto->nombre}}</td>
          <td><span class="badge bg-label-primary me-1">{{$empleado->area->nombre}}</span></td>
          <td>{{$empleado->empresa->razon_social}}</td>
          <td>
          <a href="{{ route('empleado-show', $empleado->id)}}" class="btn btn-icon btn-primary">
                <span class="tf-icons bx bx-pie-chart-alt"></span>
          </a>
          <a href="{{ route('empleado-show', $empleado->id)}}" class="btn btn-icon btn-danger">
            <span class="tf-icons bx bx-pie-chart-alt"></span>
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
  </div>
</div>
<!--/ Basic Bootstrap Table -->
@endsection
