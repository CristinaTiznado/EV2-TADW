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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interaccion  $interaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Interaccion $interaccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interaccion  $interaccion
     * @return \Illuminate\Http\Response
     */
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
}
