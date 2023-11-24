<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerroRequest;
use App\Models\Perro;
use Illuminate\Http\Request;

class PerroController extends Controller
{

    public function index()
    {
        return Perro::get();
    }

    public function create()
    {
        return view('perros.create');
    }

    public function store(PerroRequest $request)
    {
        $perro = new Perro();
        $perro->nombre = $request->input('nombre');
        $perro->url_foto = $request->input('url_foto');
        $perro->descripcion = $request->input('descripcion');
        $perro->save();

        return redirect()->route('perros.index')->with('success', 'Perro creado exitosamente.');
    }

    public function show($id)
    {
        return Perro::findorFail($id);
    }

    public function edit($id)
    {
        $perro = Perro::findOrFail($id);
        return view('perros.edit', ['perro' => $perro]);
    }

    public function update(PerroRequest $request, $id)
    {
        $perro = Perro::findOrFail($id);
        $perro->nombre = $request->input('nombre');
        $perro->url_foto = $request->input('url_foto');
        $perro->descripcion = $request->input('descripcion');
        $perro->save();

        return redirect()->route('perros.index')->with('success', 'Perro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $perro = Perro::findOrFail($id);
        $perro->delete();

        return redirect()->route('perros.index')->with('sucess','Perro eliminado exitosamente');
    }


    /*una api que entregue un perro random para utilizar como perro interesado,
     esta api debe entregar solamente el nombre e id del perro. */

    public function GetRandom()
    {

        $Dog = Perro::inRandomOrder()->first();

        return response()->json($Dog);
    }

    /*una api que entregue perros candidatos, 
    esta no debe entregar al perro interesado al momento de hacer la busqueda. 
    solo deberá recibir el id del perro interesado. */

    public function getCandidatos($id)
    {
        $Dog = Perro::inRandomOrder()->where('id', '!=', $id);
        
        return response()->json($Dog);
    }

    /*una api donde; con el id del perro interesado, ver los perros que ha aceptado 
    y otra para los rechazados. */

    public function getAceptados($id)
    {
        $Aceptados = Interaccion::where('perro_id', $id)
                                      ->where('preferencia', 'a')
                                      ->pluck('perro_candidato_id');

        return Perro::whereIn('id', $Aceptados)->get();
    }

    public function getRechazados($id)
    {
        $Rechazados = Interaccion::where('perro_id', $id)
                                       ->where('preferencia', 'r')
                                       ->pluck('perro_candidato_id');

        return Perro::whereIn('id', $Rechazados)->get();
    }
    
}
