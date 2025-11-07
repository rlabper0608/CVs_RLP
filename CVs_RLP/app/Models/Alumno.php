<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {
    protected $table = 'alumno';

    protected $fillable = ['nombre', 'apellidos', 'telefono', 'correo', 'fecha_nacimiento', 'nota_media', 'experiencia', 'formacion', 'habilidades', 'fotografia'];

     function getPath() {
        $path = url('assets/img/alumno-defecto.png');
        
        if($this->fotografia != null && file_exists(storage_path('app/public'). '/' . $this->fotografia)) {
            $path = url('storage/' . $this->fotografia);
        }
        return $path;
    }

    function getPdf() {
        return url('storage/pdf').'/'.$this->id . '.pdf';
    }

    function isPdf() {
        return file_exists(storage_path('app/public/pdf').'/'.$this->id . '.pdf');
    }
}
