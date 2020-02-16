@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert- alert-success" role="alert">
{{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{url ('empleados/create')}}" class="btn btn-success">Agregar Empleado </a>
<br/>
<br/>

<table class="table table-light table-hover">

   <thead class="thead-light">
         <tr>
              <th>#</th>
              <th>Foto</th>
              <th>Nombre Empleado</th>
              <th>Identificacion</th>
              <th>Fecha Ingreso</th>
              <th>Tipo Contrato</th>
              <th>Contrato</th>
              <th>Hoja De Vida</th>
              <th>Examen Ingreso</th>
              <th>Afiliacion eps</th>
              <th>Afiliacion arl</th>
              <th>Afiliacion caja</th>
              <th>Certificado alturas</th>
              <th>Acciones</th>

            </tr>
        </thead>


        <tbody>
        @foreach($empleados as $empleado)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>    
            <img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="70">
            </td>
            <td>{{ $empleado->NombreEmpleado}}</td>
            <td>{{ $empleado->Identificacion}}</td>
            <td>{{ $empleado->FechaIngreso}}</td>
            <td>{{ $empleado->TipoContrato}}</td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Contrato}}" alt="" width="70">
            </td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->HojaDeVida}}" alt="" width="70">
            </td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->ExamenIngreso}}" alt="" width="70">
            </td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Afiliacioneps}}" alt="" width="70">
            </td>

            <td>
            <img src="{{ asset('storage').'/'. $empleado->Afiliacionarl}}" alt="" width="70">
            </td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Afiliacioncaja}}" alt="" width="70">
            </td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Certificadoalturas}}" alt="" width="70">
            
            
            </td> 
            <td> 
                <a class="btn btn-warning" href="{{ url('/empleados/'.$empleado->id.'/edit') }}">
                Editar
                </a>
            
            <form method="post" action="{{ url('/empleados/' .$empleado->id)}}"  style="display:inline">
            
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿desea borrar el empleado?');" >Borrar</button>

            </form>

             </td> 
            
        </tr>
        @endforeach
        </tbody>
</table>
{{ $empleados->links() }}

</div>
@endsection