<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupo_farmacos',function(Blueprint $table){
            $table ->id();
            $table ->string('grupo');
            $table ->text('subgrupo');
            $table ->integer('estatus');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_farmacos');
    }
};
