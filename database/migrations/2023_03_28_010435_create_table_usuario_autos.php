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
        Schema::create('table_usuario_autos', function (Blueprint $usuario_auto) {
            $usuario_auto->increments('id_usuario_auto');
            $usuario_auto->integer('id_auto');
            $usuario_auto->integer('id_usuario');
            $usuario_auto->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_usuario_autos');
    }
};
