@extends('layouts.app')

@if (Auth::guest())
<script type="text/javascript"> window.location = "{{url('/login')}}";    </script>
@endif

@section('content')
<div class="container-fluid">

@if(Session::has('mensaje')){{
    Session::get('mensaje')
}}
@endif

<form action="{{ url('empleados/') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

    <div class="col-lg-12">
        @include('empleados.form',['modo'=>'crear'])
        
        <hr>
        <div align="center"><a href="{{ url('empleados/') }}" class="btn btn-warning">Regresar</a></div>
    </div>

</form>
</div>

@endsection