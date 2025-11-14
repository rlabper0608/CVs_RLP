<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View{
        $alumnos = Alumno::all(); //eloquent, da un array con todos los datos de la tabla
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View{
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse{
        // Queda validar los datos de entrada
        
        $alumno = new Alumno($request->all()); //eloquent, no hace nada en la base de datos
        $result = false;

        try {
            $result = $alumno->save(); //eloquent, inserta objeto en la tabla
            $txtmessage = "El alumno se ha añadido correctamente.";

            // Si me llega el archivo, lo subo y lo guardo
            if($request->hasFile('fotografia')) {
                $ruta = $this->upload($request, $alumno);
                $alumno->fotografia = $ruta;
                $alumno->save();
            }
            if($request->hasFile('pdf')) {
                $ruta = $this->uploadPdf($request, $alumno);
            }
        } catch(UniqueConstraintViolationException $e){
            $txtmessage = "Llave Primaria";
        } catch(QueryException $e){
            $txtmessage = "Valor nulo";
        }catch (\Exception $e){
            $txtmessage = "Error Fatal";
        }

        $message = [
            "mensajeTexto" => $txtmessage,
        ];

        if($result){
            return redirect()->route('main')->with($message);
        }else{
            return back()->withInput()->withErrors($message);
        }
    }

    private function upload(Request $request, Alumno $alumno):RedirectResponse {
        $fotografia = $request->file('fotografia');
        $name = $alumno->id . "." . $fotografia->getClientOriginalExtension();

        $ruta = $fotografia->storeAs('alumno', $name, 'public');
        //$ruta = $fotografia->storeAs('alumno', $name, 'local');

        return $ruta;
    }

    private function uploadPdf(Request $request, Alumno $alumno):RedirectResponse {

        $pdf = $request->file('pdf');
        //$name = $alumno->id . "." . $pdf->getClientOriginalExtension();
        $name = $alumno->id . ".pdf";

        $ruta = $pdf->storeAs('pdf', $name, 'public');
        //$ruta = $pdf->storeAs('pdf', $name, 'local');

        return $ruta;
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno):View{
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno):View{
        return view('alumnos.edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno): RedirectResponse{
        $result = false;
        $alumno->fill($request->all());

        try {
            $result = $alumno->save();
            $txtmessage = "The student has been edited.";
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = "Primary Key";
        } catch(QueryException $e) {
            $txtmessage = "Null value";
        }catch (\Exception $e) {
            $txtmessage = "Fatal error";
        }

        $message = [
            "mensajeTexto" => $txtmessage,
        ];

        if($result){
            return redirect()->route('main')->with($message);
        }else{
            return back()->withInput()->withErrors($message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno):RedirectResponse {
        try{
            $result = $alumno->delete();
            $textmessage='El alumno se ha eliminado';
        }
        catch(\Exception $e){
            $result = false;
            $textmessage='El alumno no se ha eliminado';
        }
        $message = [
            'messajeTexto' => $textmessage,
        ];
        if($result){
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }
}
