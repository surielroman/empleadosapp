@extends('layouts.app')

@if (Auth::guest())
<script type="text/javascript"> window.location = "{{url('/login')}}";    </script>
@endif

@section('content')

<div class="container-fluid">

<h1>Listado de Registros</h1>

@if(Session::has('mensaje')){{
    Session::get('mensaje')
}}
@endif

<a href="{{ url('empleados/create') }}" class="btn btn-success">Crear Empleados</a>

<table class="table table-light table-striped">
    <thead class="thead-light">
        <th<tr>
            <th>No.</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Sal Dolares</th>
            <th>Sal Pesos</th>
            
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Correo</th>

            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
     @foreach($empleados as $empleado)   
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $empleado->codigo }}</td>
            <td>{{ $empleado->name }}</td>
            <td>{{ $empleado->salarioDolares }}</td>
            <td>{{ $empleado->salarioPesos }}</td>
            
            <td>{{ $empleado->estado }}</td>
            <td>{{ $empleado->ciudad }}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->correo }}</td>

            <td>{{ $empleado->activo=='1' ? 'Habilitado' : 'Inactivo'}}</td>
            <td>
                <a href="{{ url('empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning"> Editar  </a> 
                <form method="post" action="{{ url('/empleados/'.$empleado->id) }}">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <button type="submit" onclick="return confirm('¿Deseas borrar el registro?')" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
    @endforeach    
    </tbody>
</table>
</div>
@endsection