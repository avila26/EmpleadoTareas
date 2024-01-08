<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{
    public function index()
    {
        $empleado = empleado::where('estado', true)->get();
        $tarea = DB::table('tareas')
            ->join('empleados', 'empleados.id', '=', 'tareas.empleado_id')
            ->where('tareas.estado', 1)
            ->select('tareas.*', 'empleados.nombre')
            ->get();
        return view('empleaTareas.tarea', compact('empleado', 'tarea'));
    }

    public function store(Request $request)
    {
        $tarea = new tarea();
        $tarea->nombreTarea = $request->input('nombreTarea');
        $tarea->tiempoInvertido = $request->input('tiempoInvertido');

        $empleado = empleado::find($request->input('empleado_id'));
        $horasTrabajadas = $empleado->horas_trabajadas;


        if ($tarea->tiempoInvertido > $horasTrabajadas) {
            return redirect()->back()->with('status', 'El tiempo invertido  es mayor a las horas trabajadas del empleado.');
        }


        $tarea->empleado_id = $empleado->id;
        $tarea->save();

        return redirect()->back()->with('status', 'La Tarea fue guardada exitosamente.');
    }

}
