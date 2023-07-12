<?php

namespace App\Http\Controllers;

use App\Models\Secretatio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SecretatioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Secretario/Index', [
            'secretarios' => Secretatio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Secretario/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $secretario = new Secretatio;
        $secretario->secretario = $request->input('secretaria');
        $secretario->save();
        return to_route('secretario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secretatio $secretatio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , $id)
    {
        //
        $secretario = Secretatio::findOrFail($id);
        return Inertia::render('Secretario/Edit', [
            'secretario' => $secretario
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //edita los valores de doctor
        $secretario = Secretatio::findOrFail($id);
        $secretario->secretario = $request->input('secretario');
        $secretario->save();
        return to_route('secretario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //elimina la secretaria
        $secretario = Secretatio::findOrFail($id);
        $secretario->delete();
        return to_route('secretario.index');
    }
}
