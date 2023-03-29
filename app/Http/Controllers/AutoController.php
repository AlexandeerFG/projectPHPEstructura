<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoController extends Controller
{
    //

    public function showAuto(){

    }

    public function indexAuto($id){

        return $id;
    }

    public function createAuto(Request $request){
        return 'nice create';

    }

    public function deleateAuto(Request $request){
        return 'nice delete';

    }

    public function updateAuto(Request $request){
        return 'nice update';

    }
}
