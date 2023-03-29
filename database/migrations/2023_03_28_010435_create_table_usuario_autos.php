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
            $usuario_auto->unsignedInteger('id_auto');
            $usuario_auto->unsignedInteger('id_usuario');
            $usuario_auto->timestamps();
            $usuario_auto->foreign('id_auto')->references('id_auto')->on('table_autos');
            $usuario_auto->foreign('id_usuario')->references('id')->on('table_usuarios');

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
