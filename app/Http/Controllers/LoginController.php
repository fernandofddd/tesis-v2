<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;


class LoginController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function validar(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 
            'password' => 'required', 
        ]);


        $consulta = User::where('email', $request->email)->where('password', $request->password)->get();
        $cuantos = count($consulta);

        if($cuantos== 1){
            return redirect()->route('reporteempleados');
        } else {
            echo "Acceso denegado";
        }

        
    }
}