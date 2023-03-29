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
        DB::beginTransaction();
        try{

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
            throw $e;
        }
    }

    public function indexUsuario($id)
    {
        try{
            return Usuario::findOrFail($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateUsuario(UpdateUsuarioValidate $request)
    {
        DB::beginTransaction();
        try {
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
            return "Registro Actualizado con el ID siguiente: {$request->id}";
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleateUsuario(Request $request)
    {
        DB::beginTransaction();
        try{
            $usuario = Usuario::query()
            ->where('id', $request->id)
            ->first();

            if(!$usuario) throw new \Exception("No se encontro el usuario '{$request->id}'");

            $usuario = Usuario::destroy($request->id);
            DB::commit();
            return "Registro Eliminado con el ID siguiente: {$request->id}";

        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
