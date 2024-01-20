<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

route::get('mensaje',[EmpleadosController::class,'mensaje']);
route::get('nomina/{diast}/{pago}',[EmpleadosController::class,'nomina']);
route::get('muestrasaludo/{nombre}/{dias}',[EmpleadosController::class,'saludo']);
route::get('salir',[EmpleadosController::class,'salir'])->name('salir');
route::get('vb',[EmpleadosController::class,'vb'])->name('vb');
route::get('altaempleado',[EmpleadosController::class,'altaempleado'])->name('altaempleado');
route::post('guardarempleado',[EmpleadosController::class,'guardarempleado'])->name('guardarempleado');
route::get('eloquent',[EmpleadosController::class,'eloquent'])->name('eloquent');
route::get('reporteempleados',[EmpleadosController::class,'reporteempleados'])->name('reporteempleados');
route::get('desactivaempleados/{ide}',[EmpleadosController::class,'desactivaempleados'])->name('desactivaempleados');
route::get('activarempleados/{ide}',[EmpleadosController::class,'activarempleados'])->name('activarempleados');
route::get('borraempleados/{ide}',[EmpleadosController::class,'borraempleados'])->name('borraempleados');
route::get('modificarempleado/{ide}',[EmpleadosController::class,'modificarempleado'])->name('modificarempleado');
route::post('guardarcambios',[EmpleadosController::class,'guardarcambios'])->name('guardarcambios');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ruta1', function () {
    return "Hola mundo";
});

Route::get('/arearectangulo', function () {
    $base = 4;
    $altura = 10;
    $area = $base * $altura;
    return $area;
});

Route::get('/arearectangulo2', function () {
    $base = 4;
    $altura = 10;
    $area = $base * $altura;
    return "el area del rectangulo es:"  .$area. "con base $base y altura $altura";
});

Route::get('/arearectangulo3/{base}/{altura}', function ($base, $altura) {
    $area = $base * $altura;
    return "el area del rectangulo es:"  .$area. "con base $base y altura $altura";
});


/*Route::get('/nomina/{diast}/{pagodiario?}', function ($diast, $pagodiario=null) {

    if($pagodiario == null){
        $pagodiario = 100;
        $nomina = $diast * $pagodiario;
    }else{
        $nomina = $diast * $pagodiario;
    }
    echo "Dias Trabajados $diast";
    echo "<br> Pago nomina" . $pagodiario;
    echo "<br> Total Pago $nomina";
});*/

Route::get('/redireccionamiento', function(){
    return redirect('ruta1');
});

Route::redirect('redireccionamiento2','ruta1');
Route::redirect('redireccionamiento3','arearectangulo3/4/7');

Route::get('/redireccionamiento4/{base}/{altura}', function($base,$altura){
    return redirect("/arearectangulo3/$base/$altura");
});

Route::redirect('/redireccionamiento5', 'https://www.google.com');