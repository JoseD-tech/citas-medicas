<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Historial;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retorna la vista de Doctores

        $citas = Cita::with('PacienteCita')->get();

        return Inertia::render('Doctor/Index', [
            'citas' => $citas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Doctor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Registra el Historial de la cita y cambiar el estado
        // Guardar En historial
        $consulta = new Historial;
        $consulta->paciente_id = $request->input("paciente");
        $consulta->doctor = $request->input("doctor");
        $consulta->descripcion = $request->input("descripcion");
        $consulta->resultado = $request->input("resultado");
        $consulta->save();

        // cambia el estado de la cita
        $cita = Cita::findOrFail($request->input("id"));
        $cita->estado_id = 2;
        $cita->save();

        return to_route('doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
        return Inertia::render('Doctor/Edit', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //edita los valores de doctor
        $doctor = Doctor::findOrFail($id);
        $doctor->doctor = $request->input('doctor');
        $doctor->save();
        return to_route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();
    }
}
