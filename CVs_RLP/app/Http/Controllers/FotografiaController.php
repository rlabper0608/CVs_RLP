<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Alumno;

class FotografiaController extends Controller {

    function fotografia($idfotografia) {
        $peinado = Peinado::find($idfotografia);

        if($alumno == null || $alumno->fotografia == null){
            return response()->file(base_path('public/assets/img/no-image.png'));
        }
        return response()->file(storage_path('app/private'). '/' . $alumno->fotografia);
    }

}
