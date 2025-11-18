<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoCreateRequest extends FormRequest {

    function authorize(): bool {
        return true;
    }

    function attributes(): array {
        return [
            'nombre' => 'nombre del alumno',
            'apellidos' => 'apellidos del alumno',
            'telefono' => 'telefono del alumno',
            'correo' => 'correo del alumno',
            'fecha_nacimiento' => 'fecha de nacimiento del alumno',
            'nota_media' => ' nota media del alumno',
            'experiencia' => 'experiencia del alumno',
            'formacion' => 'formacion del alumno',
            'habilidades' => 'habilidades del alumno',
            'fotografia' => 'fotografia del alumno',
            'pdf' => 'CV del alumno',
        ];
    }

    function messages(): array {
        $required = "Es olbigatorio introducir :attribute.";
        $min = "La longitud minima del campo :attribute es :min.";
        $max = "La longitud maxima del campo :attribute es :max.";
        $string = "El campo debe ser un string.";
        
        return [
            'nombre.requiered' => $required,
            'nombre.string' => $string,
            'nombre.min' => $min,
            'nombre.max' => $max,
            'apellidos.required' => $required,
            'apellidos.string' => $string,
            'apellidos.min' => $min,
            'apellidos.max' => $max,
            'telefono.required' => $required,
            'telefono.string' => $string,
            'telefono.min' => $min,
            'telefono.max' => $max,
            'correo.required' => $required,
            'correo.email' => 'El campo debe ser un email.',
            'correo.unique' => 'No puedes usar ese correo, porque ya está en uso.',
            'correo.min' => $min,
            'correo.max' => $max,
            'fecha_nacimiento.required' => $required,
            'fecha_nacimiento.date' => 'El campo debe ser una fecha.',
            'nota_media.required' => $required,
            'nota_media.numeric' => 'El campo debe ser un numero.',
            'nota_media.min' => $min,
            'nota_media.max' => $max,
            'experiencia.required' => $required,
            'experiencia.string' => $string,
            'experiencia.min' => $min,
            'experiencia.max' => $max,
            'formacion.required' => $required,
            'formacion.string' => $string,
            'formacion.min' => $min,
            'formacion.max' => $max,
            'habilidades.required' => $required,
            'habilidades.string' => $string,
            'habilidades.min' => $min,
            'habilidades.max' => $max,
            'fotografia.image' => 'La :attribute tiene que ser de formato imagen(png, jpg, etc.)',
            'fotografia.size' => 'El tamaño de la :attribute no puede superar los 2048KB.',
            'pdf.file' => "El pdf del :attribute tiene que ser un .pdf",
            'pdf.size' => "El tamaño del pdf del :attribute no puede superar los 2048KB"
        ];
    }

    function rules(): array {
        return [
            "nombre"            => "required|string|min:2|max:60",
            "apellidos"         => "required|string|min:3|max:100",
            "telefono"          => "required|string|min:3|max:12",
            "correo"            => "required|email|unique:alumno,correo|min:3|max:40",
            "fecha_nacimiento"  => "required|date",
            "nota_media"        => "required|numeric|min:0|max:10",
            "experiencia"       => "required|string|min:5|max:2000",
            "formacion"         => "required|string|min:5|max:2000",
            "habilidades"       => "required|string|min:5|max:2000",
            "fotografia"        => "nullable|image|size:2048",
            "pdf"               => "nullable|file|size:2048"
        ];
    }
}
