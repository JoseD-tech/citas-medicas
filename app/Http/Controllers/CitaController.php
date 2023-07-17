<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Exports\CitasExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::class;
        $roles = [];
        $doctores = DB::table('model_has_roles')->where('role_id', 2)->get();

        foreach ($doctores as $doctor) {
            $doctor = User::where('id',$doctor->model_id)->first();
            array_push($roles, $doctor);
        }

        //retona las citas
        $citas = Cita::with('PacienteCita')->get();
        return Inertia::render('Citas/Index', [
            "pacientes" => Paciente::all(),
            "doctores" => $roles, //para saber cuales son lo roles de doctor
            "citas" => $citas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda la cita
        $cita = new Cita;
        $cita->decripcion = $request->input('descripcion');
        $cita->paciente_id = $request->input('paciente');
        $cita->doctor = $request->input('doctor');
        $cita->fecha_cita = $request->input('fecha');
        $cita->estado_id = 1;
        $cita->save();
        return to_route('citas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }

    public function export()
    {
        var_dump('hola');
        return Excel::download(new CitasExport, 'Citas.xlsx');
    }
}
