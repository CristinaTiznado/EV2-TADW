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
}
