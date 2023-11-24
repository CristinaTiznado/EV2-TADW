<?php

namespace App\Http\Controllers;

use App\Models\Interaccion;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{

    public function index()
    {
        return Interaccion::get();
    }

    public function create()
    {
        return view('perros.create');
    }

    public function store(InteraccionRequest $request)
    {
        $interesado = $request->input('perro_id');
        $candidato = $request->input('perro_candidato_id');
        $preferencia = $request->input('preferencia');
        
        $interaccion = new Interaccion;
        $interaccion->perro_id = $interesado;
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


    public function edit($id)
    {
        $interaccion = Interaccion::findOrFail($id);
        return response()->json($interaccion, status:201);
    }

    public function update(InteraccionRequest $request)
    {
        $candidato = $request->input('perro_candidato_id');
        $preferencia = $request->input('preferencia');

        $interaccion = Interaccion::findorFail($candidato);
        $interaccion->perro_interesado_id = 1;
        $interaccion->perro_candidato_id = $candidato;
        $interaccion->preferencia = $preferencia;
        $interaccion->update();
        return response()->json($interaccion, status:201);
    }

    public function destroy($id)
    {
        $perro = Interaccion::findOrFail($id);
        $perro->delete();

        return redirect()->route('perros.index')->with('sucess','Perro eliminado exitosamente');
    }

    public function preferencia(InteraccionRequest $request)
    {
        $interaccion = new Interaccion ;
        $interaccion->perro_id = $request->input('perro_id');
        $interaccion->perro_candidato_id = $request->input('perro_candidato_id');
        $interaccion->preferencia = $request->input('preferencia');

        $interaccion->save();
        return response()->json($interaccion, status:201);
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
