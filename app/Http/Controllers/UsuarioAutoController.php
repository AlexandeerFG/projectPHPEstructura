<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioAutoController extends Controller
{
    //

    public function showUsuarioAuto(){ //-- muestra todos los registros

    }

    public function indexUsuarioAuto($id){ // -- trae un registro en particular

        return $id;
    }

    public function createUsuarioAuto(Request $request){ // -- creacion de un registro
        return 'nice create';

    }

    public function deleateUsuarioAuto(Request $request){ // -- elimina registro
        return 'nice delete';

    }

    public function updateUsuarioAuto(Request $request){ // -- actualizacion de registro
        return 'nice update';

    }
}
