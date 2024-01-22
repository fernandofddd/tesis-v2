@extends('vistabootstrap')

@section('contenido')
<div class="container">
	<h1>Alumnos Inscritos</h1>
<br>
<a href="{{route('altaempleado')}}">
<button type="button" class="btn btn-success">Registro de estudiantes</button>
</a>
<br>
<br>
@if(Session::has('mensaje'))
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Clave</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Correo</th>
      <th scope="col">Programa</th>
      <th scope="col">Operaciones</th>
      <th scope="col">Activacion</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($consulta as $c)
    <tr>
      <td> <img src="{{asset('archivos/'.$c->img)}}"height = "50" width="50"></td>
      <th scope="row">{{$c->ide}}</th>
      <td>{{$c->nombre}} {{$c->apellido}}</td>
      <td>{{$c->email}}</td>
      <td>{{$c->depa}}</td>

      <td><a href="{{route('modificarempleado',['ide'=>$c->ide])}}"><button type="button" class="btn btn-info">Modificar</button></a></td>
      @if($c->deleted_at)
      <td><a href="{{route('activarempleados',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-warning">Activar</button>
      </a>
      <a href="{{route('borraempleados',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-dark">Borrar</button>
      </a></td>
      @else
      <td><a href="{{route('desactivaempleados',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-danger">Desactivar</button>
      </a></td>
      @endif
    </tr>
    @endforeach
    <tr>
  </tbody>
</table>
</div>
@stop