<?php

namespace App\Http\Controllers;


// Importamos el modelo y clases necesarias
use App\Models\Alumno;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


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

    public function store(Request $request):RedirectResponse{
   
        // Validación de todos los campos enviados desde el formulario
        $request->validate([
            "nombre" => "required|string|max:60",
            "apellidos" => "required|string|max:100",
            "telefono" => "required|string|max:12",
            "correo" => "required|email|unique:alumno,correo|max:40",
            "fecha_nacimiento" => "required|date",
            "nota_media" => "required|numeric|min:0|max:10",
            "experiencia" => "required|string|max:2000",
            "formacion" => "required|string|max:2000",
            "habilidades" => "required|string|max:2000",
            "fotografia" => "nullable|image|max:2048",
        ]);
        
        // Creamos un nuevo objeto Alumno con los datos del request
        $alumno = new Alumno($request->all());
        $result = false;

        // Intentamos guardar al alumno en la base de datos, y si no manejamos posibles errores
        try {
            $result = $alumno->save(); 
            $txtmessage = "El alumno se ha añadido correctamente.";

            // Si me llega la fotografia, la subo y la guardo
            if($request->hasFile('fotografia')) {
                $ruta = $this->upload($request, $alumno);
                $alumno->fotografia = $ruta;
                $alumno->save();
            }

            // Si se sube un PDF, lo subimos (sin guardar en BD)
            if($request->hasFile('pdf')) {
                $ruta = $this->uploadPdf($request, $alumno);
            }
            
        } catch(UniqueConstraintViolationException $e){
            // Error por clave duplicada
            $txtmessage = "Clave duplicada";
        } catch(QueryException $e){
            $txtmessage = "Valor nulo";
        }catch (\Exception $e){
            // Cualquier error
            $txtmessage = "Error Fatal";
        }

        $message = [
            "mensajeTexto" => $txtmessage,
        ];

        // Mostramos en la página si se guardó correctamente el alumno o saltó algun error
        if($result){
            return redirect()->route('main')->with($message);
        }else{
            return back()->withInput()->withErrors($message);
        }
    }

    // Función para subir la fotografía, si es que ha decidido subirla
    private function upload(Request $request, Alumno $alumno):string {

        $fotografia = $request->file('fotografia');
        $name = $alumno->id . "." . $fotografia->getClientOriginalExtension();

        $ruta = $fotografia->storeAs('alumno', $name, 'public');

        return $ruta;
    }

    // Función para guardar el pdf, si es que lo ha subido
    private function uploadPdf(Request $request, Alumno $alumno): string {

        $pdf = $request->file('pdf');
        $name = $alumno->id . ".pdf";

        $ruta = $pdf->storeAs('pdf', $name, 'public');

        return $ruta;
    }

    // Función que nos devuelve la vista, donde se ve la información individual de cada alumno
    public function show(Alumno $alumno):View{
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    // Función que nos devuelve el formulario relleno con la información del usuario por si queremos editarla
    public function edit(Alumno $alumno):View{
        return view('alumnos.edit', ['alumno' => $alumno]);
    }

    // Función que nos permite actualizar la información que hemos editado en le formulario pasado en la función de arriba
    public function update(Request $request, Alumno $alumno): RedirectResponse{

        // Validamos que todos los datos introducidos sean correctos
        $request->validate([
            "nombre" => "required|string|max:60",
            "apellidos" => "required|string|max:100",
            "telefono" => "required|string|max:12",
            "correo" => "required|email|max:40",
            "fecha_nacimiento" => "required|date",
            "nota_media" => "required|numeric|min:0|max:10",
            "experiencia" => "required|string|max:2000",
            "formacion" => "required|string|max:2000",
            "habilidades" => "required|string|max:2000",
            "fotografia" => "nullable|image|max:2048",
        ]);

        if($request->deleteImage == 'true') {
            // Borrado de la imagen de la fotografia seleccionada
            Storage::delete($alumno->fotografia);
            
            //La ponemos como nula
            $alumno->fotografia = null;
            
        }

        $result = false;
        $alumno->fill($request->all());

        // Volvemos a repetir el try catch, que teniamos en estore, para los errores y en este caso la actualización de información
        try {
            if($request->hasFile('fotografia')) {
                $ruta = $this->upload($request, $alumno);
                $alumno ->fotografia = $ruta;
            }

            if($request->hasFile('pdf')) {
            // Elimina el PDF anterior si existe
            $rutaPdfAntiguo = 'pdf/' . $alumno->id . '.pdf';
            if(Storage::disk('public')->exists($rutaPdfAntiguo) ||   Storage::disk('local')->exists($rutaPdfAntiguo)) {
                Storage::disk('public')->delete($rutaPdfAntiguo);
                Storage::disk('local')->delete($rutaPdfAntiguo);
            }
            
            // Guarda el nuevo PDF (machaca el anterior con el mismo nombre)
            $this->uploadPdf($request, $alumno);
        }

            $result = $alumno->save();
            $txtmessage = "El alumno se ha actualizado.";
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = "Clave duplicada";
        } catch(QueryException $e) {
            $txtmessage = "Valor nulo";
        }catch (\Exception $e) {
            $txtmessage = "Error fatal";
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

    // Función que sirve para elimminar del resgistro a un alumno
    public function destroy(Alumno $alumno): RedirectResponse {

        try{
            $result = $alumno->delete();
            $textmessage='El alumno se ha eliminado';
        }
        catch(\Exception $e){
            $result = false;
            $textmessage='El alumno no se ha eliminado';
        }
        $message = [
            'mensajeTexto' => $textmessage,
        ];
        if($result){
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }
}
