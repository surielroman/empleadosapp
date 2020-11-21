@extends('layouts.app')

@if (Auth::guest())
<script type="text/javascript"> window.location = "{{url('/login')}}";    </script>
@endif

@section('content')

<form class="form-group" action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="col-lg-12">
        @include('empleados.form',['modo'=>'editar'])
        <hr>
        <div align="center">
            <a href="{{ url('empleados/') }}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</form>

@endsection