<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class MainController extends Controller{

    function main():View{
        $alumno = Alumno::all();
        return view('main.main', ['alumno' => $alumno]);
    }
}