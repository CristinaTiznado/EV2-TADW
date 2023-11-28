<?php

namespace App\Http\Controllers;

use App\Models\Interaccion;
use Illuminate\Http\Request;
use App\Http\Requests\InteraccionRequest;


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

    /*dejamos el crud creado para manipular las pruebas. Sabemos que no eran necesarias dentro de los requisitos.(y a estas alturas no quiero tocar nada porque funciona todo)
    
    A continuación: Una api donde se guardarán las preferencias de cada perro.
    */

    public function preferencia(InteraccionRequest $request)
    {
        $interaccion = new Interaccion ;
        $interaccion->perro_id = $request->input('perro_id');
        $interaccion->perro_candidato_id = $request->input('perro_candidato_id');
        $interaccion->preferencia = $request->input('preferencia');

        $interaccion->save();

        $match = $this->match($interaccion);

        if ($match) {
            return response()->json(['message' => '¡Hay match!'], status:200);
        } else {
            return response()->json(['message' => 'OK'], status:201);
        }
    }

    /*it’s a Match! - Cada vez que ud registre una interaccion deberá validar si existe o no un match
        entre los perros. en caso de haber, el sistema debe retornar un mensaje de “hay match”. caso
        contrario, deberá retornar un mensaje de “ok”. */

    private function match($interaccion)
    {
        $perroId = $interaccion->perro_id;
        $candidatoId = $interaccion->perro_candidato_id;

        //Agradecido con la explicación en la pizarra
        $match = Interaccion::where('perro_id', $candidatoId)
                                ->where('perro_candidato_id', $perroId)
                                ->where('preferencia', 'a')
                                ->first();

        return !is_null($match);

    }


}
