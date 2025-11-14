<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller {
    
    public function index():View{
        // Tomamos todos los alumons, y los pasamos para poder visualizarlos por pantalla en el index
        $alumnos = Alumno::all(); 
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    public function create():View{
        // Devolvemos la vista create, la cual contiene un formulario para rellenar
        return view('alumnos.create');
    }

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse{
        // Queda validar los datos de entrada
=======
    public function store(Request $request):RedirectResponse{
   
>>>>>>> 04574e2 (Mejoras 14-11)
        
        $alumno = new Alumno($request->all());
        $result = false;

        // Intentamos guardar al alumno en la base de datos, y si no manejamos posibles errores
        try {
            $result = $alumno->save(); 
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

<<<<<<< HEAD
    private function upload(Request $request, Alumno $alumno):RedirectResponse {
=======
    // Función para actualizar la información si es que nos hemos equivocado
    private function upload(Request $request, Alumno $alumno) {
>>>>>>> 04574e2 (Mejoras 14-11)
        $fotografia = $request->file('fotografia');
        $name = $alumno->id . "." . $fotografia->getClientOriginalExtension();

        $ruta = $fotografia->storeAs('alumno', $name, 'public');

        return $ruta;
    }

    private function uploadPdf(Request $request, Alumno $alumno):RedirectResponse {

        $pdf = $request->file('pdf');
        $name = $alumno->id . ".pdf";

        $ruta = $pdf->storeAs('pdf', $name, 'public');

        return $ruta;
    }

    public function show(Alumno $alumno):View{
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    public function edit(Alumno $alumno):View{
        return view('alumnos.edit', ['alumno' => $alumno]);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse{
        $result = false;
        $alumno->fill($request->all());

        try {
            $result = $alumno->save();
            $txtmessage = "El alumno se ha actualizado.";
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

<<<<<<< HEAD
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno):RedirectResponse {
=======
    public function destroy(Alumno $alumno): RedirectResponse {
>>>>>>> 04574e2 (Mejoras 14-11)
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
