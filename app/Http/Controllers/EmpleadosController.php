<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;
use App\Models\nominas;
use App\Models\departamentos;
use Session;

class EmpleadosController extends Controller
{
    public function mensaje(){
        return "Hola Trabajador";
    }


    public function nominas($diast,$pago){
        $nomina = $diast*$pago;
        dd($nomina,$diast,$pago);
        return "el pago $nomina con dias $diast y pago diario de $pago"; 
    }
    public function saludo($nombre,$dias){
        //return view('empleado',compact('nombre','dias'));
        //return view('empleado',['nombre'=>$nombre,'dias'=>$dias]);
        $pago = 100;
        $nomina = $dias * $pago;
        return view('empleado')->with('nombre',$nombre)->with('dias',$dias)->with('nomina',$nomina);
    }

    public function salir(){
        return "salir";
    }

    public function vb(){
        return view ('vistabootstrap');
    }


     public function eloquent(){
       // $consulta = empleados::all();
       /*$empleados = new empleados;
       $empleados->ide = 5;
       $empleados->nombre = "Pedro";
       $empleados->apellido = "Perez";
       $empleados->email = "pedro@gmail.com";
       $empleados->celular = "7344345566";
       $empleados->sexo = "M";
       $empleados->descripcion = "Pureba de insercion";
       $empleados->idd = 5;
       $empleados->save();*/

     /*  $empleado = empleados::create([
    'ide' => 4, 
    'nombre' => 'Paty', 
    'apellido' => 'Mendez', 
    'email' => 'paty@gmail.com', 
    'celular' => '734582143', 
    'sexo' => 'F', 
    'descripcion' => 'prueba', 
    'idd' => 5
]);*/  /*

    $empleados = empleados::find(5);
    $empleados->nombre = "Dulce";
    $empleados->apellido = "Montiel";
    $empleados->save();*/
    
    //empleados::where('sexo','M')
    //->update(['nombre'=>'francisco','celular'=>'5555555']);

    //empleados::destroy(5);
      
    //$empleados = empleados::find(5);
    //$empleados->delete();

    /*$empleados=empleados::where('sexo','F')
    ->where('celular','734582143')
    ->delete(); */

   //$empleados = empleados::find(5);
    //$empleados->delete();

    //$consulta = empleados::withTrashed()->get();
    //$consulta = empleados::onlyTrashed()->get(); solo eliminados
    /*$consulta = empleados::onlyTrashed
    ->where('sexo','F')
    ->get(); */
    //return $consulta

    //$consulta = empleados::withoutTrashed()->get();
    //return "eliminacion realizada";
    //empleados::withTrashed()->where('ide',11)->restore(); //busca los que estan en la basura, donde sea el 11 y restauralo
        
   /* $empleados = empleados::find(11)->forceDelete();
        $consulta = empleados::all();*/
       // return $consulta;
    /*$empleados = new empleados;
    $empleados->ide = 9;
    $empleados->nombre = "Joel";
    $empleados->apellido = "Medina";
    $empleados->email = "joel@gmail.com";
    $empleados->celular = "4773748";
    $empleados->edad = "30";
    $empleados->sexo = "M";
    $empleados->salario = "1400";
    $empleados->descripcion = "Prueba 5";
    $empleados->idd = 1;
    $empleados->save();*/
   // $consulta = empleados::where('sexo','M')->get();
    // $consulta = empleados::where('sexo','=','M')->get();
   // $consulta = empleados::where('edad','>=','20')->where('edad','<=','30')->get();

   // $consulta = empleados::whereBetween('edad',[20,30])->get(); //este sirve para numeros y fechas
   //$consulta = empleados::whereIn('ide',[3,4,5])->get(); //que sea uno de esos valores

   // $consulta = empleados::whereIn('ide',[3,4,5])->orderBy('nombre','desc')->get();

    //$consulta = empleados::where('edad','>=','20')->where('edad','<=','30')->take(2)->get(); //primeros 2 registros
   // $consulta = empleados::select(['nombre','apellido','edad'])->where('edad','>=',30)->get();

   // $consulta = empleados::select(['nombre','apellido','edad'])->where('apellido','LIKE','%rre%')->get();
       
   // $consulta = empleados::where('sexo','F')->sum('salario');

    /*$consulta = empleados::groupBy('sexo')
    ->selectRaw('sexo,sum(salario) as salariototal')
    ->get();*/ //se hacen los agrupamientos sobre los campos que no estan afectados por el sum
       
    /* $consulta = empleados::groupBy('sexo')
    ->selectRaw('sexo,count(*) as cuantos')
    ->get(); */

    /*$consulta = empleados::join('departamentos','empleados.idd','=','departamentos.idd')
    ->select('empleados.ide','empleados.nombre','departamentos.nombre as depa','empleados.edad')
    ->where('empleados.edad','>=',30)
    ->get(); */ //info de dos tablas distintas
       //si no se coloca el depa, para diferenciar las variables nombre de ambas tablas, el programa se va a quedar con la ultima y elimina la otra

    $consulta = empleados::where('edad','>=','40')->orwhere('sexo','F')->get();

    //$consulta = count($consulta);

       return $consulta;
       // return "Operacion realizada";
    }

    public function altaempleado(){
       // return view('altaempleado');

        $consulta = empleados::orderBy('ide','DESC')
        ->take(1)->get();
        $cuantos = count($consulta);
        if($cuantos==0){
            $idesigue = 1;
        }
        else{
            $idesigue = $consulta[0]->ide + 1;
        }

        $departamentos = departamentos::orderBy('nombre')->get();

        return view('altaempleado')->with('idesigue',$idesigue)
        ->with('departamentos',$departamentos);
       // return $idesigue;
    }

    public function guardarempleado(Request $request){
        //return $request;
        //dd($request);

        //para calculos
        $nombre = $request->nombre;
        $sexo = $request->sexo; 
        $this->validate($request,['nombre' => 'required|regex:/^[A-Z][A-Z,a-z, , á, é, í, ó, ú, ü]+$/', 'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, , á, é, í, ó, ú, ü]+$/', 'celular' => 'required|regex:/^[0-9]{10}$/', 'email' => 'required|email', 'img' => 'image|mimes:jpeg,gif,png']);
        $file = $request->file('img');
        if($file<>""){
        $img = $file->getClientOriginalName();
        $img2 = $request->ide . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
    }else{
        $img2 = "sinfoto.jpg";
    }
        

        //la prioridad es de izquierda a derecha para los validadores
        //'ide' => 'required|regex:/^[E][M][P][-][0-9]{5}$/' el ide iba primero pero lo elimino puesto que ya no vamos a validar porque lo va a leer directo de la BD

        /*@if($errors->first('img'))
            <p class='text-danger'>{{$errors->first('img')}}</p>
            @endif*/
        
    $empleados = new empleados;
    $empleados->ide = $request->ide;
    $empleados->nombre = $request->nombre;
    $empleados->apellido = $request->apellido;
    $empleados->email = $request->email;
    $empleados->celular = $request->celular;
    $empleados->edad = $request->edad;
    $empleados->sexo = $request->sexo;
    $empleados->salario = $request->salario;
    $empleados->descripcion = $request->descripcion;
    $empleados->img = $img2;
    $empleados->idd = $request->idd;
    $empleados->save();

    /*return view('mensajes')
    ->with('proceso',"ALTA DE EMPLEADOS")
    ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido dado de alta correctamente")
    ->with('error',1);*/
    Session::flash('mensaje',"El empleado  ha sido dado de alta correctamente");
    return redirect()->route('reporteempleados');
       // echo "Todo Correcto";
        
        /*if($sexo =='M'){
            echo "El empleado $nombre es hombre";
        }
        else{
            echo "$nombre es mujer";
        }*/
       // return view('vista2');
    }

    public function reporteempleados(){
    $consulta = empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
    ->select('empleados.ide','empleados.nombre','empleados.apellido','departamentos.nombre as depa','empleados.email','empleados.deleted_at','empleados.img')
    ->orderBy('empleados.nombre')
    ->get();
    return view('reporteempleados')->with('consulta',$consulta);
    }

    public function desactivaempleados($ide){
        $empleados = empleados::find($ide); 
        $empleados->delete();   //como en empleados tengo softdelete lo borra logicamente
        /*return view('mensajes')
        ->with('proceso',"DESACTIVAR EMPLEADOS")
        ->with('mensaje',"El empleado ha sido desactivado correctamente")
        ->with('error',1);*/
        Session::flash('mensaje',"El empleado  ha sido desactivado correctamente");
    return redirect()->route('reporteempleados');
    }

     public function activarempleados($ide){
        $empleados = empleados::withTrashed()->where('ide',$ide)->restore();
        /*return view('mensajes')
        ->with('proceso',"ACTIVAR EMPLEADOS")
        ->with('mensaje',"El empleado ha sido activado correctamente")
        ->with('error',1);*/
        Session::flash('mensaje',"El empleado  ha sido activado correctamente");
    return redirect()->route('reporteempleados');
     }

     public function borraempleados($ide){
        $buscaempleados = nominas::where('ide',$ide)->get();
        $cuantos = count($buscaempleados);
        if($cuantos==0)
        {
      $empleados = empleados::withTrashed()->where('ide',$ide)->forceDelete();
        /*return view('mensajes')
        ->with('proceso',"ACTIVAR EMPLEADOS")
        ->with('mensaje',"El empleado ha sido activado correctamente")
        ->with('error',1);*/
        Session::flash('mensaje',"El empleado ha sido borrado correctamente");
    return redirect()->route('reporteempleados');
     }else{
        /*return view('mensajes')
        ->with('proceso',"ACTIVAR EMPLEADOS")
        ->with('mensaje',"El empleado  no se puede eliminar ya que tiene registros de nomina")
        ->with('error',0);*/
        Session::flash('mensaje',"El empleado no se puede borrar");
    return redirect()->route('reporteempleados');
     }
 }

    public function modificarempleado($ide){
        $consulta = empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
    ->select('empleados.ide','empleados.nombre','empleados.apellido','departamentos.nombre as depa','empleados.email','empleados.idd','empleados.descripcion','empleados.nombre','empleados.celular','empleados.img')
    ->where('ide',$ide)
    ->get();
    $departamentos = departamentos::all();
        return view('modificarempleado')->with('consulta',$consulta[0])->with('departamentos',$departamentos);
    }
    public function guardarcambios(Request $request){
        $this->validate($request,['nombre' => 'required|regex:/^[A-Z][A-Z,a-z, , á, é, í, ó, ú, ü]+$/', 'apellido' => 'required|regex:/^[A-Z][A-Z,a-z, , á, é, í, ó, ú, ü]+$/', 'celular' => 'required|regex:/^[0-9]{10}$/', 'email' => 'required|email', 'img' => 'image|mimes:jpeg,gif,png']);

        $file = $request->file('img');
        if($file<>""){
        $img = $file->getClientOriginalName();
        $img2 = $request->ide . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
    }
        
    $empleados = empleados::withTrashed()->find($request->ide);
    $empleados->ide = $request->ide;
    $empleados->nombre = $request->nombre;
    $empleados->apellido = $request->apellido;
    $empleados->email = $request->email;
    $empleados->celular = $request->celular;
    $empleados->edad = $request->edad;
    $empleados->sexo = $request->sexo;
    $empleados->salario = $request->salario;
    $empleados->descripcion = $request->descripcion;
    if($file<>""){
    $empleados->img = $img2;
    }
    $empleados->idd = $request->idd;
    $empleados->save();

    /*return view('mensajes')
    ->with('proceso',"MODIFICAR EMPLEADOS")
    ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido MODIFICADO correctamente")
    ->with('error',1);*/
    Session::flash('mensaje',"El empleado $request->nombre $request->apellido ha sido modificado correctamente");
    return redirect()->route('reporteempleados');
    }
}
