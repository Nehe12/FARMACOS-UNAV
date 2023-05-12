<?php

namespace App\Http\Controllers;

use App\Models\Farmacos;
use App\Models\GrupoFarmaco;
use Database\Factories\GrupoFarmacoFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


class GrupoFarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = GrupoFarmaco::all();
        return view('editGrupo', compact('grupos'));
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


        $grupo = new GrupoFarmaco();
        $grupo->grupo = $request->grupo;
        $grupo->subgrupo = $request->subgrupo;
        if (isset($request->estatus)) {
            $grupo->estatus = $request->input('estatus');
        } else {
            $grupo->estatus = 0;
        }
        $grupo->save();
        return redirect('/farmaco');
    }

    public function store2(Request $request)
    {


        $grupo = new GrupoFarmaco();
        $grupo->grupo = $request->grupo;
        $grupo->subgrupo = $request->subgrupo;
        if (isset($request->estatus)) {
            $grupo->estatus = $request->input('estatus');
        } else {
            $grupo->estatus = 0;
        }
        $grupo->save();
        return redirect('/editGrupo');
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
    public function update(Request $request)
    {
        $grupo = GrupoFarmaco::find($request->grupo_id);
        $grupo->grupo = $request->grupoUP;
        $grupo->subgrupo = $request->subgrupoU;
        if (isset($request->estatus)) {
            $grupo->estatus = $request->input('estatus');
        } else {
            $grupo->estatus = 0;
        }
        $grupo->save();
        return redirect()->route('show.grupos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupo = GrupoFarmaco::findOrFail($id);

        $sql = "SELECT exists(select * from `farmacos`
         where `farmacos`.`id_grupo` = $grupo->id 
         and `farmacos`.`id_grupo` is not null) as `exists`";
        $farmaco = DB::select($sql);
        // $activo= array_get($farmaco);
        foreach ($farmaco as $farm) {
            $activo = $farm->exists;
        }
        if ($activo == 1) {
            return redirect()->route('show.grupos')->with('msg', 'No se puede eliminar porque pertenece a u farmaco');
        } else {
            $grupo->delete();
            return redirect()->route('show.grupos')->with('msgDelete', 'Grupo eliminado');
        }
    }
}
