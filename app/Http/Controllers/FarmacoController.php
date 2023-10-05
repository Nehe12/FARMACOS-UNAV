<?php

namespace App\Http\Controllers;

use App\Models\Bibliografias;
use App\Models\GrupoFarmaco;
use App\Models\Farmacos;
use App\Models\Interacciones;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Google\Service\Storage as ServiceStorage;
//  use Google\Service\Storage;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Filesystem;
use Dotenv\Exception\ValidationException;

class FarmacoController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function iniciar()
    {
        $credenciales =  request()->validate([
            'password' => ['required', 'string'],
            'name' => ['required','string']
        ]);
         $remember = request()->filled('remember');
        // dd(request()->filled('remember'));
        // dd($credenciales);
        if (Auth::attempt($credenciales,$remember)) {
            request()->session()->regenerate();
            return redirect()->route('inicio');
        }
        // throw ValidationException->withErrors({});
        return redirect()->route('login')->with('alert', 'Login fallo');
    }
    public function logout()
    {
        Auth::logout();
        //invalidar sesion
        request()->session()->invalidate();
        //invalidar token
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sql = "SELECT `farmacos`.`id`, `farmacos`.`farmaco`, `farmacos`.`mecanismo`, `farmacos`.`url`, `farmacos`.`efecto`, `farmacos`.`recomendaciones`,`farmacos`.`estatus`, `grupo_farmacos`.`grupo`
        FROM `farmacos` 
            LEFT JOIN `grupo_farmacos` ON `farmacos`.`id_grupo` = `grupo_farmacos`.`id`";
        $farmacos = DB::select($sql);
        $interacciones = Interacciones::all();
        $interacciones->toJson();
        return view("index", compact('farmacos', 'interacciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bibliografia = Bibliografias::all();
        $grupo = GrupoFarmaco::all();
        $farmacos = Farmacos::all();
        // $itemfarmaco = Farmacos::latest()->first();
        return view('farmaco', compact('bibliografia', 'grupo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farmaco = new Farmacos();
        $path = Storage::disk('google')->put('farmacos_img', $request->file('image'));
        $url = Storage::disk('google')->url($path);
       
        $farmaco->farmaco = $request->farmaco;
        $farmaco->mecanismo = $request->mecanismo;
        $farmaco->url = $url;
        $farmaco->efecto = $request->efecto;
        $id_bibliografia = $request->bibliografia;
        $farmaco->recomendaciones = $request->recomendacion;

        $farmaco->id_grupo = $request->grupo;
       
        $farmaco->save();
        $farmaco->bibliografias()->attach($id_bibliografia);

        $itemfarmaco = Farmacos::latest()->first();
        $biblioselect = Farmacos::select('bibliografias.*')
            ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
            ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
            ->where('farmacos.id', $itemfarmaco)
            ->get();
        $bibliografia = Bibliografias::all();
        $id = $itemfarmaco;
        return redirect()->route('edit.farmaco', compact('id', 'itemfarmaco', 'bibliografia'))->with('success', 'Agregado con exito!!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farmacos = Farmacos::find($id);
        /*$bibliografia = Bibliografia::all();
        $grupo =GrupoFarmaco::all();*/
        return view('eliminar', compact('farmacos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $sql_Inter ="SELECT `interacciones`.`ID`,`interacciones`.`interaccion`, `farmacos`.`farmaco`, `farmacos`.`id`
        // FROM `interacciones` 
        //     LEFT JOIN `farmacos` ON `interacciones`.`id_farmaco` = `farmacos`.`id`";
        // $interacciones_tabla=DB::select($sql_Inter);
        $farmacos = Farmacos::find($id);
        $bibliografia = Bibliografias::all();
        $grupo = GrupoFarmaco::all();
        $interacciones = Interacciones::all();
        $biblioselect = Farmacos::select('bibliografias.*')
            ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
            ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
            ->where('farmacos.id', '=', $farmacos->id)
            ->get();
        // dd($biblioselect); 
        // $biblioselect = DB::table('bibliografias')
        //       ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
        //       ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
        //       ->select('bibliografias.*')
        //       ->where('farmacos.id','=', $farmacos->id)
        //       ->get();
        //      dd($biblioselect);
        //   $idS=$farmacos->id;
        //   $sql_B= " SELECT `bibliografias`.* FROM `farmacos` 
        //   INNER JOIN `farmacobibliografia` ON `farmacos`.`id` = `farmacobibliografia`.`farmacos_id` 
        //   INNER JOIN `bibliografias` ON `farmacobibliografia`.`bibliografias_id` = `bibliografias`.`id` WHERE `farmacos`.`id` = $idS ";
        //   $biblioselect=DB::select($sql_B);
        //   print_r($biblioselect);
        return view('editarFarmaco', compact('farmacos', 'bibliografia', 'grupo', 'interacciones', 'biblioselect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $farmaco = Farmacos::find($id);
        $id = $farmaco->id;
        $url = $farmaco->url;

        if ($request->hasFile('image')) {
            // $get_url = Storage::get($url);
            Storage::delete($url);
            // dd(Storage::delete('farmacos_img',$url));
            $path = Storage::disk('google')->put('farmacos_img', $request->file('image'));
            $url = Storage::disk('google')->url($path);
            // dd($url);
        }
        $farmaco->farmaco = $request->farmaco;
        $farmaco->mecanismo = $request->mecanismo;
        // $farmaco->public_id = '$public_id';
        $farmaco->url = $url;
        $farmaco->efecto = $request->efecto;
        $farmaco->recomendaciones = $request->recomendacion;
        $id_bibliografia = $request->bibliografia;
        $farmaco->id_grupo = $request->grupo;
        // if (isset($request->estatus)) {
        //     $farmaco->status = $request->input('estatus');
        // } else {
        //     $farmaco->status = 0;
        // }
        $farmaco->save();
        $farmaco->bibliografias()->sync($id_bibliografia);
        $biblioselect = Farmacos::select('bibliografias.*')
            ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
            ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
            ->where('farmacos.id', $id)
            ->get();
        $bibliografia = Bibliografias::all();
        return redirect()->route('edit.farmaco', compact('id', 'biblioselect', 'bibliografia'))->with('success', 'Actualizado con exito!!');
    }
    // Update con Cloudinary
    /*public function update(Request $request, string $id)
    {
        $farmaco = Farmacos::find($id);
        $id = $farmaco->id;
        $public_id = $farmaco->public_id;
        $url = $farmaco->url;

        if ($request->hasFile('image')) {
            Cloudinary::destroy($public_id);
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'farmacos2',
            ]);
            $url = $uploadedFileUrl->getSecurePath();
            $public_id = $uploadedFileUrl->getPublicId();
        }
        $farmaco->farmaco = $request->farmaco;
        $farmaco->mecanismo = $request->mecanismo;
        $farmaco->public_id = $public_id;
        $farmaco->url = $url;
        $farmaco->efecto = $request->efecto;
        $id_bibliografia = $request->bibliografia;
        $farmaco->id_grupo = $request->grupo;
        if (isset($request->estatus)) {
            $farmaco->status = $request->input('estatus');
        } else {
            $farmaco->status = 0;
        }
        $farmaco->save();
        $farmaco->bibliografias()->sync($id_bibliografia);
        $biblioselect = Farmacos::select('bibliografias.*')
            ->join('farmacobibliografia', 'farmacos.id', '=', 'farmacobibliografia.farmacos_id')
            ->join('bibliografias', 'farmacobibliografia.bibliografias_id', '=', 'bibliografias.id')
            ->where('farmacos.id', $id)
            ->get();
        $bibliografia = Bibliografias::all();
        return redirect()->route('edit.farmaco', compact('id', 'biblioselect', 'bibliografia'))->with('success', 'Actualizado con exito!!');
    }*/

    public function activo(Request $request, $id)
    {
        $farmaco = Farmacos::find($id);
        // dd($request->input('estatus'));
        if ($request->input('estatus') == 1) {
            $nuevoEstatus = $request->input('estatus') == 'checked' ? 1 : 0;
        } else {
            $nuevoEstatus = $request->input('estatus') == 'checked' ? 0 : 1;
        }

        $farmaco->estatus = $nuevoEstatus;
        $farmaco->save();

        $sql = "SELECT `farmacos`.`id`, `farmacos`.`farmaco`, `farmacos`.`mecanismo`, `farmacos`.`url`, `farmacos`.`efecto`,`farmacos`.`recomendaciones`, `farmacos`.`estatus`, `grupo_farmacos`.`grupo`
        FROM `farmacos` 
            LEFT JOIN `grupo_farmacos` ON `farmacos`.`id_grupo` = `grupo_farmacos`.`id`";
        $farmacos = DB::select($sql);


        return view("index", compact('farmacos'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //$interacciones = Interacciones::all();
        $farmaco = Farmacos::find($id);
        $public_id = $farmaco->public_id;
        //  Cloudinary::destroy($public_id);
        //$farmacos->$interacciones->delete();
        $farmaco->delete();
        return redirect()->route('inicio')->with('success', 'Eliminado con exito!!');
    }
    public function reporte()
    {
        /*<-<-<-<-<--<- Cantidad de bibliografias por farmaco tabla >->->->->->->->-->>->- */
        $sql1 = "SELECT farmacos.id AS far, farmacos.farmaco, GROUP_CONCAT(bibliografias.titulo SEPARATOR ' -||\n ') AS titulos
        FROM farmacos
        LEFT JOIN farmacobibliografia ON farmacobibliografia.farmacos_id = farmacos.id
        LEFT JOIN bibliografias ON farmacobibliografia.bibliografias_id= bibliografias.id
        GROUP BY far, farmacos.farmaco";
        $farma_biblio = DB::select($sql1);
        // dd($farma_biblio);
        /*<-<-<--<-<-<-<--<-<-<-<--<Cantidad de Interacciones del farmaco tabla >->->-->->->->-->->->->-->->*/
        $sql2 = "SELECT farmacos.id AS far, farmacos.farmaco,farmacos.efecto,farmacos.mecanismo,grupo_farmacos.grupo, GROUP_CONCAT(interacciones.interaccion SEPARATOR ' -|| \n ') AS interaccion
        FROM farmacos
        LEFT JOIN interacciones ON farmacos.id = interacciones.id_farmaco
        LEFT JOIN grupo_farmacos ON farmacos.id_grupo = grupo_farmacos.id
        GROUP BY far, farmacos.farmaco,grupo_farmacos.grupo,farmacos.efecto,farmacos.mecanismo";
        $farma_grupo = DB::select($sql2);

        /*<-<--<-<-<-<--<-<--Cantidad de farmacos por grupo >-->->-->->->-->->-->->->-->->->-->->->*/
        $sql3 = "SELECT grupo_farmacos.id, grupo_farmacos.grupo as grupo, COUNT(farmacos.id) as cant_farm
        FROM grupo_farmacos
        LEFT JOIN farmacos ON farmacos.id_grupo = grupo_farmacos.id
        GROUP BY grupo_farmacos.id,grupo";
        $grupos = DB::select($sql3);
        // dd($grupos);
        /*<-<-<--<-<--<-<-<--< #biliografias por farmaco Grafica >->->->->-->->->->*/
        $sql4 = "SELECT `farmacos`.`id`, `farmacos`.`farmaco` AS far, COUNT(bibliografias.id) AS CAN 
        FROM `farmacos`
        LEFT JOIN `farmacobibliografia` ON `farmacos`.`id` = `farmacobibliografia`.`farmacos_id` 
        LEFT JOIN `bibliografias` ON `farmacobibliografia`.`bibliografias_id` = `bibliografias`.`id`
        GROUP BY farmacos.id,far";
        $biblios = DB::select($sql4);

        /*<-<-<-<-<--<-<-< Cantidad de interacciones por farmaco >-->->->->-->->-->-*/
        $sql5 = "SELECT `farmacos`.`id`, `farmacos`.`farmaco` AS far, COUNT(interacciones.id) AS int_can
        from `farmacos`
        LEFT JOIN interacciones ON interacciones.id_farmaco = farmacos.id
        GROUP BY farmacos.id,far";
        $interac = DB::select($sql5);


        return view("reportes", compact('farma_biblio', 'farma_grupo', 'grupos', 'biblios', 'interac'));
    }

    public function createUser(Request $request){
        
        return view('crearUsuario');
    }
    public function saveUser(Request $request){
        $usuario = new User();
        $usuario->name = $request->name;
        $email = $request->email;
        if (preg_match('/^([a-zA-Z0-9\.]+)@/', $email, $matches)) {
            $username = $matches[1]; 
            $password = $username;
        } else {
            echo 'Formato de correo electrónico no válido.';
        }
        $passwordHash = Hash::Make($password);
        // dd($passwordHash);
        $usuario->email = $email;
        $usuario->password = $passwordHash;
        $usuario->save();
        return redirect()->route('crear.usuario')->with('success', 'Creado con éxito!!');
    }
}
