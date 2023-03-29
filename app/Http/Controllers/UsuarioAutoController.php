<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioAutoController extends Controller
{
    //

    public function showUsuarioAuto(){ //-- muestra todos los registros
    }

    public function createUsuarioAuto(Request $request){ // -- creacion de un registro

        DB::beginTransaction();
        try{
            return 'nice create';
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
        }

    }
    public function indexUsuarioAuto($id){ // -- trae un registro en particular

        return $id;
    }

    public function updateUsuarioAuto(Request $request){ // -- actualizacion de registro
        return 'nice update';

    }

    public function deleateUsuarioAuto(Request $request){ // -- elimina registro
        return 'nice delete';

    }

}
