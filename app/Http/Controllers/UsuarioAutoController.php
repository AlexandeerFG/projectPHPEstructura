<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuarioAutoValidate;
use App\Http\Requests\DeleteUsuarioAutoValidate;
use App\Http\Requests\UpdateUsuarioAutoValidate;
use App\Models\UsuarioAuto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioAutoController extends Controller
{
    //

    public function showUsuarioAuto(){ //-- muestra todos los registros
    }

    public function createUsuarioAuto(CreateUsuarioAutoValidate $request){ // -- creacion de un registro
        try{
            DB::beginTransaction();

            $usuarioAuto = UsuarioAuto::query()  //-- validacion de que existan las lalves foraneas
            ->where('id_usuario', $request->id_usuario)
            ->where('id_auto', $request->id_auto)
            ->first();
            if(isset($usuarioAuto))throw new \Exception('Ya existe un registro con los parametros que desea ingrear');

            $usuarioAuto = UsuarioAuto::create([
                'id_usuario' => $request->id_usuario,
                'id_auto'    => $request->id_auto,
            ]);
            DB::commit();
            return $usuarioAuto;

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function indexUsuarioAuto($id){ // -- trae un registro en particular
        try{
            $usuarioAuto = UsuarioAuto::find($id);
            if(!$usuarioAuto)throw new \Exception("No se encontro el registro con el ID {$id}");

            return $usuarioAuto;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateUsuarioAuto(UpdateUsuarioAutoValidate $request){ // -- actualizacion de registro
        try{
            DB::beginTransaction();
            $usuarioAuto = UsuarioAuto::query()
            ->where('id_usuario_auto', $request->id_usuario_auto)
            ->first();

            if(!$usuarioAuto)throw new \Exception("No se encontro el usuario auto con el ID {$request->id_usuario_auto}");

            $usuarioAuto->update([
                'id_usuario' => $request->id_usuario,
                'id_auto'    => $request->id_auto
            ]);
            DB::commit();
            return "Registro Actualizado con el ID siguiente: {$usuarioAuto->id_usuario_auto}";


        }catch(\Exception $e){
            DB::rollBack();
            $e->getMessage();
        }
        return 'nice update';

    }

    public function deleateUsuarioAuto(DeleteUsuarioAutoValidate $request){ // -- elimina registro
        try{
            DB::beginTransaction();
            $usuarioAuto = UsuarioAuto::query()
            ->where('id_usuario_auto', $request->id_usuario_auto)
            ->first();

            if(!$usuarioAuto)throw new \Exception("No existe el registro con el ID {$request->id_usuario_auto}");

            UsuarioAuto::destroy($usuarioAuto->id_usuario_auto);
            DB::commit();

            return "Registro con el ID {$usuarioAuto->id_usuario_auto} eliminado correctamente";

        }catch(\Exception $e){
            DB::rollBack();
            throw $e->getMessage();
        }

    }

}
