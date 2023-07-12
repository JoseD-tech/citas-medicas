<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retorna todos los pacientes
        return Inertia::render('Pacientes/Index', [
            'pacientes' => Paciente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Pacientes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //guarda los pacientes en la base de datos
        $paciente = new Paciente;
        $paciente->nombre = $request->input('nombre');
        $paciente->apellido = $request->input('apellido');
        $paciente->cedula = $request->input('cedula');
        $paciente->telefono = $request->input('telefono');
        $paciente->save();
        return to_route('paciente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
        return Inertia::render('Pacientes/Edit', [
            'paciente' => $paciente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $paciente = Paciente::findOrFail($id);
        $paciente->nombre = $request->input('nombre');
        $paciente->apellido = $request->input('apellido');
        $paciente->cedula = $request->input('cedula');
        $paciente->telefono = $request->input('telefono');
        $paciente->save();
        return to_route('paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
        $paciente->delete();
    }
}
