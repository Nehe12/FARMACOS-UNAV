<?php

namespace App\Http\Controllers;

use App\Models\Bibliografia;
use Illuminate\Http\Request;

class BibliografiaController extends Controller
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
        
        return view('bibliografia');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bibliografia = new Bibliografia();
        $bibliografia->titulo=$request->titulo;
        $bibliografia->descripcion=$request->descripcion;
        $bibliografia->autor=$request->autor;
        $bibliografia->anio=$request->año;
        $bibliografia->editorial=$request->editorial;
        if (isset($request->estatus)) {
            $bibliografia->estatus=$request->input('estatus');
           }else {
               $bibliografia->estatus=0;
           }
        $bibliografia->save();
        return redirect('/farmaco');
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
