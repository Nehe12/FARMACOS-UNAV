<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bibliografias;

class Farmacos extends Model
{
    use HasFactory;
    
    public function bibliografias()
    {
        return $this->belongsToMany(Bibliografias::class,'farmacobibliografia');
    }

    public function grupos(){
        return $this->belongsTo(GrupoFarmaco::class);
    }
    // protected $fillable = [
    //     'id',
    //     'farmaco',
    //     'mecasnimo',
    //     'url',
    //     'efecto',
    //     'id_grupo'
    // ];
    
}
/*hasOne          > 1:1       > Tiene Uno
hasMany         > 1:n       > Tiene Muchos
hasManyThrough  > 1:n       > Tiene Muchos a traves de
belongsTo       > 1:1       > Pertenece a
belongsToMany   > n:n       > Pertenece y tiene Muchos
hasOneThrough   > 1:1       > Tiene Uno a traves de
morphTo         > 1:1 y 1:n > Definir Tabla Polimorfica
morphedByMany   > nn        > Definir Tabla Polimorfica
morphOne        > 1:1       > Tiene Uno Polimorfica
morphMany       > 1:n       > Tiene Muchos Polimorfica
morphToMany     > n:n       > Tiene Muchos Polimorfica*/
