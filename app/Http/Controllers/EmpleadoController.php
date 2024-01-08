<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    public function index(){
        $empleado =empleado::where('estado', true)->get();
        return view('empleaTareas.empleado',compact('empleado'));
    }
  
    public function store(Request $request){
        $empleado =new empleado();
        $empleado->nombre = $request->nombre;
        $empleado->fecha_contratacion = $request->fecha_contratacion;
        $empleado->horas_trabajadas = $request->horas_trabajadas;
        $empleado->salario = $request->salario;
        $empleado->departamento = $request->departamento;
        $empleado->save();
        return back();
    }
}
