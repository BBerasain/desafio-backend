<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller

{

    public function index(Request $request)
    {
        $seleccionArea = $request->input('area');
    
        $areas = empleados::select('area')->distinct()->get();
    
        if ($seleccionArea) {
            $empleados = empleados::where('area', $seleccionArea)->paginate(30);
        } else {
            $empleados = empleados::paginate(30);
        }
    
        return view('empleados.index', compact('empleados', 'areas', 'seleccionArea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("empleados.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEmpleados=$request->except("_token");

        if($request->hasfile("foto")){
            $datosEmpleados["foto"]=$request->file("foto")->store("uploads","public");
        }

        empleados::insert($datosEmpleados);

        return redirect()->route('empleados.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleados = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleados')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $empleados = Empleados::findOrFail($id);
        $empleados->nombre = $request->input('nombre');
        $empleados->apellido = $request->input('apellido');
        $empleados->area = $request->input('area');
        $empleados->puesto = $request->input('puesto');

        if ($request->has('foto')) {
            $destino = 'public/' . $empleados->foto;
            if (Storage::exists($destino)) {
                Storage::delete($destino);
            }
            $empleados['foto']=$request->file("foto")->store("uploads","public");
        }

        $empleados->save();

        return redirect()->route('empleados.index');
    }

    public function destroy(empleados $empleados)
    {
        $empleados->delete();
        storage::delete('public/'.$empleados->foto);
        
        return redirect()->route('empleados.index');
    }    
}
