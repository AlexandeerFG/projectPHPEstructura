<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuarioValidate;
use App\Http\Requests\UpdateUsuarioValidate;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function showUsuario()
    {
    }

    public function createUsuario(CreateUsuarioValidate $request)
    {
        try{
            DB::beginTransaction();

            $usuario = new Usuario;
            $usuario->nombre          = $request->nombre;
            $usuario->apellidoPaterno = $request->apellidoPaterno;
            $usuario->apellidoMaterno = $request->apellidoMaterno;
            $usuario->telefono        = $request->telefono;
            $usuario->correo          = $request->correo;
            $usuario->save();

            DB::commit();
            return $usuario;

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function indexUsuario($id)
    {
        try{
            return Usuario::findOrFail($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateUsuario(UpdateUsuarioValidate $request)
    {
        try {
            DB::beginTransaction();
            $usuario = Usuario::query()
                ->where('id', $request->id)
                ->first();
            if (!$usuario) throw new \Exception("No se encontro el usuario '{$request->id}'");

            $usuario->update([
                'nombre'          => $request->nombre,
                'apellidoPaterno' => $request->apellidoPaterno,
                'apellidoMaterno' => $request->apellidoMaterno,
                'telefono'        => $request->telefono,
                'correo'          => $request->correo,
            ]);
            DB::commit();
            return "Registro Actualizado con el ID siguiente: {$request->id}";

        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function deleateUsuario(Request $request)
    {
        try{
            DB::beginTransaction();
            $usuario = Usuario::query()
            ->where('id', $request->id)
            ->first();

            if(!$usuario) throw new \Exception("No se encontro el usuario '{$request->id}'");

            Usuario::destroy($usuario->id);
            DB::commit();

            return "Registro con el ID {$usuario->id} eliminado correctamente";

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
