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
        Schema::create('table_autos', function (Blueprint $autos) {
            $autos->increments('id_auto');
            $autos->string('modelo');
            $autos->string('color');
            $autos->string('marca');
            $autos->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_autos');
    }
};
