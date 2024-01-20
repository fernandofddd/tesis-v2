<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
</head>
<body>
		<h1>Empresa PATITO.com</h1>
	<br>
	Nombre del empleado <?php echo "$nombre trabajo $dias se le pago $nomina"; ?>
	Nombre del empleado {{$nombre}} trabajo {{$dias}} se le pago {{$nomina}}
	<br>
	@if($nombre=="Robert")
	<h1>Hola MINPPAL</h1>
	<img src="{{asset('fotos/logo.jpg')}}" weight=100 height="100">
	@endif
	@if($nombre=="Manuel")
	<h1>Hola MINPPAL 2</h1>
	<img src="{{asset('fotos/ministerio.jpg')}}" weight=100 height="100">
	@else
	<h1>No hay foto</h1>
	@endif
	<a href="{{route('salir')}}"> Cerrar nomina</a>
</body>
</html>