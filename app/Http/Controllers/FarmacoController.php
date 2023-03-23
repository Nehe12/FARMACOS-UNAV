<?php

namespace App\Http\Controllers;

use App\Models\Bibliografia;
use App\Models\Farmaco;
use App\Models\GrupoFarmaco;
use App\Models\Interacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;




class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sql = "SELECT `farmacos`.`id`,`farmacos`.`farmaco`,`farmacos`.`mecanismo`,`farmacos`.`efecto`, `bibliografias`.`titulo`, `grupo_farmacos`.`grupo` FROM `farmacos` LEFT JOIN `bibliografias` ON `farmacos`.`id_bibliografia` = `bibliografias`.`id` LEFT JOIN `grupo_farmacos` ON `farmacos`.`id_grupo` = `grupo_farmacos`.`id`";
        $farmacos=DB::select($sql);
        
        /*$farmacos=DB::table('farmacos')
            ->select('farmaco','mecanismo','efecto','titulo','grupo')
            ->leftJoin('bibliografias','farmacos.id_bibliografia','=','bibliografias.id')
            ->leftJoin('grupo_farmacos','farmacos.id_grupo','=','grupo_farmacos.id')
            ->get();
            var_dump($farmacos);return;*/
        
        return view("index",compact('farmacos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bibliografia = Bibliografia::all();
        $grupo =GrupoFarmaco::all();
        return view('farmaco',compact('bibliografia','grupo'));
        //return view('farmaco')->with('bibliografia', $bibliografia); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(),[
            'folder'=>'farmacos',
        ]);
        $url = $uploadedFileUrl->getSecurePath();
        $public_id=$uploadedFileUrl->getPublicId();
        //$url = Cloudinary::getUrl($publicId);
        
        $farmaco =new Farmaco();
        $farmaco->farmaco=$request->farmaco;
        $farmaco->mecanismo=$request->mecanismo;
        $farmaco->public_id=$public_id;
        $farmaco->url=$url;
        $farmaco->efecto=$request->efecto;
        $farmaco->id_bibliografia=$request->bibliografia;
        $farmaco->id_grupo=$request->grupo;
        $farmaco->save();
        return redirect()->route('crear.farmaco')->with('success', 'Agregado con exito!!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $farmacos = Farmaco::find($id); 
        /*$bibliografia = Bibliografia::all();
        $grupo =GrupoFarmaco::all();*/
        return view('eliminar',compact('farmacos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $farmacos = Farmaco::find($id); 
        $bibliografia = Bibliografia::all();
        $grupo =GrupoFarmaco::all();
        return view('editarFarmaco',compact('farmacos','bibliografia','grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $farmaco = Farmaco::find($id);
        $public_id = $farmaco->public_id;
        $url = $farmaco->url;
        
        if ($request->hasFile('image')) {
            Cloudinary::destroy($public_id);
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(),[
                'folder'=>'farmacos',
            ]);
            $url = $uploadedFileUrl->getSecurePath();
            $public_id=$uploadedFileUrl->getPublicId();
           
        }
        $farmaco->farmaco=$request->farmaco;
        $farmaco->mecanismo=$request->mecanismo;
        $farmaco->public_id=$public_id;
        $farmaco->url=$url;
        $farmaco->efecto=$request->efecto;
        $farmaco->id_bibliografia=$request->bibliografia;
        $farmaco->id_grupo=$request->grupo;
        $farmaco->save();
        return redirect()->route('inicio')->with('success', 'Actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        //$interacciones = Interacciones::all();
        $farmaco = Farmaco::find($id);
        $public_id=$farmaco->public_id;
        Cloudinary::destroy($public_id);
        //$farmacos->$interacciones->delete();
        $farmaco->delete();
        return redirect()->route('inicio')->with('success', 'Eliminado con exito!!');
    }

    /*Mostrar  */
    public function mostrar($id){
               
                $grupo=GrupoFarmaco::all();
                $interacciones=Interacciones::all();
                $bibliografia=Bibliografia::all();
                $sql2="SELECT `farmacos`.`id`,`farmacos`.`farmaco`, `farmacos`.`efecto`, `farmacos`.`mecanismo`, `farmacos`.`url`, `bibliografias`.`titulo`, `grupo_farmacos`.`grupo`, `interacciones`.`tipo`, `interacciones`.`interaccion` 
                FROM `farmacos` 
                LEFT JOIN `bibliografias` ON `farmacos`.`id_bibliografia` = `bibliografias`.`id` 
                LEFT JOIN `grupo_farmacos` ON `farmacos`.`id_grupo` = `grupo_farmacos`.`id` 
                LEFT JOIN `interacciones` ON `interacciones`.`id_farmaco` = `farmacos`.`id`";
                $farmacos2=DB::select($sql2);
                $farmacos2 = Farmaco::find($id);
                $farmacos2->toArray();
       return view('mostrar',compact('farmacos2','grupo','interacciones','bibliografia'));
    }
}
