<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoEditRequest extends AlumnoCreateRequest {

    public function rules(): array {

        $array = parent::rules();
        $array ['correo'] = 'required|email|max:40|unique:alumno,correo,'.$this->alumno->id;
        return $array;
    }
}
