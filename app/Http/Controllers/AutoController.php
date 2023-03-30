<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutoValidate;
use App\Http\Requests\UpdateAutoValidate;
use App\Http\Requests\DeleteAutoValidate;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;

class AutoController extends Controller
{
    //

    public function showAuto(){

    }

    public function createAuto(CreateAutoValidate $request){

        try{
            DB::beginTransaction();
            $auto = new Auto;
            $auto->modelo = $request->modelo;
            $auto->color  = $request->color;
            $auto->marca  = $request->marca;
            $auto->save();

            DB::commit();
            return $auto;

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }
    public function indexAuto($id){

        DB::beginTransaction();
        try{
            return Auto::findOrFail($id);
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function updateAuto(UpdateAutoValidate $request){
        try{
            DB::beginTransaction();
            $auto = Auto::query()
            ->where('id_auto', $request->id_auto)
            ->first();

            if(!$auto) throw new \Exception("No se encontro el auto con el ID '{$request->id_auto}'");

            $auto->update([
                'modelo' => $request->modelo,
                'color'  => $request->color,
                'marca'  => $request->marca,
            ]);
            DB::commit();
            return "Registro Actualizado con el ID siguiente: {$request->id_auto}";

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function deleateAuto(DeleteAutoValidate $request){
        try{
            DB::beginTransaction();

            $auto = Auto::query()
            ->where('id_auto', $request->id_auto)
            ->first();

            if(!$auto)throw new \Exception("No se encontro el auto con el ID '{$request->id_auto}'");

            Auto::destroy($auto->id_auto);
            DB::commit();

            return "Registro con el ID {$auto->id_auto} eliminado correctamente";


        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

}
