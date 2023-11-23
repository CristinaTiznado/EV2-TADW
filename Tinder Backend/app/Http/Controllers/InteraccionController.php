<?php

namespace App\Http\Controllers;

use App\Models\Interaccion;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Interaccion::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interesado = $request->input('perro_id');
        $candidato = $request->input('perro_candidato_id');
        $preferencia = $request->input('preferencia');

        $interaccion = new Interaccion;
        $interaccion->perro_interesado_id = $interesado;
        $interaccion->perro_candidato_id = $candidato;
        $interaccion->preferencia = $preferencia;
        $interaccion->save();
        return response()->json($interaccion, status:201);
    }

    public function show($id)
    {
        $interaccion = Interaccion::findOrFail($id);
        return response()->json($interaccion, status:201);
    }


    public function edit(Interaccion $interaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interaccion  $interaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interaccion $interaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interaccion  $interaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interaccion $interaccion)
    {
        //
    }

    public function aceptados()
    {
        $Interacciones = Interaccion::where('preferencia', 'aceptado')->get();
        return response()->json($Interacciones);
    }

    public function rechazados()
    {
        $Interacciones = Interaccion::where('preferencia', 'rechazado')->get();
        return response()->json($Interacciones);
    }
}
