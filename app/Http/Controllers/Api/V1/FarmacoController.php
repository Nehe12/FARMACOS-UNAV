<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FarmacoResource;
use App\Models\Farmacos;
use App\Models\Interacciones;
use App\Models\Bibliografias;
use App\Models\GrupoFarmaco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FarmacoResource::collection(Farmacos::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(farmacos $farmaco)
    {
        $interacciones = Interacciones::select('interacciones.*')
            ->join('farmacos', 'interacciones.id_farmaco', '=', 'farmacos.id')
            ->where('interacciones.id_farmaco', $farmaco->id)
            ->get();
        $grupo = GrupoFarmaco::select('grupo_farmacos.*')
            ->join('farmacos', 'farmacos.id_grupo', '=', 'grupo_farmacos.id')
            ->where('farmacos.id', $farmaco->id)
            ->get();
        //return $interacciones;
        $biblioselect = Farmacos::select('bibliografias.*')
            ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
            ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
            ->where('farmacos.id', $farmaco->id)
            ->get();

        $respuesta = [
            'farmaco' => $farmaco,
            'grupo' => $grupo,
            'interacciones' => $interacciones,
            'biblioselect' => $biblioselect,
        ];

        // Devolver la respuesta
        return $respuesta;
    }

    public function search(Request $request)
    {
        $sql = "SELECT `farmacos`.* FROM `farmacos` 
        WHERE `farmacos`.`farmaco` 
        LIKE '%$request->consulta%'";
        $sql_Farm = DB::select($sql);
        // $sql_Farm->toJson();
        // return response()->tojson($sql_Farm);
        return $sql_Farm;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmacos $farmaco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(farmacos $farmaco)
    {
        if ($farmaco->delete()) {
            return response()->json([
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
