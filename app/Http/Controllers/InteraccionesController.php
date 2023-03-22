<?php

namespace App\Http\Controllers;

use App\Models\Farmaco;
use App\Models\Interacciones;
use Illuminate\Http\Request;

class InteraccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $farmacos=Farmaco::all();
        return view('interacciones',compact('farmacos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $interaccion = new Interacciones();
        $interaccion->tipo=$request->tipo_interaccion;
        $interaccion->interaccion=$request->interaccion;
        $interaccion->id_farmaco=$request->farmaco;
        $interaccion->status=$request->estatus;
        $interaccion->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
