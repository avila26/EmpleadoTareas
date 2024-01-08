<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function mostrarEmpleados( Request $request)
    {
   
        $empleados = Empleado::where('estado', 1)-> where('departamento', $request->datoFiltrado)->get();

    
        return view('empleaTareas.mostrarEmpleados', compact('empleados'));
    }

    // public function filtrar(Request $request){
    //      $empleados = Empleado::where('estado', 1)->get();
    //     $libros= DB::table('libros')
    //     ->join('autors', 'autor_id', '=','autors.id')
    //     ->where('libros.estado', 1)
    //     ->where('autors.id', '=', $request->datoFiltrado)
    //     ->select('libros.*', 'libros.nombre as nombre_libro', 'autors.nombre as nombre_autor')
    //     ->get();
    //     return view('librito.tabla',compact('libros', 'autor'));//  
    // } 
    

    
}
