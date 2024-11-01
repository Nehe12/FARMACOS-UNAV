<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoFarmaco extends Model
{
    use HasFactory;
    public function farmacos(){
        return $this->hasMany(Farmacos::class);
    }
}
