<?php

namespace App\Http\Controllers;

use App\Imports\AsignadoImport;
use Illuminate\Http\Request;
use App\Models\Upload;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploads(){
        $uploads = Upload::select('uploads.*', 
                                'nombre_proceso')
                            ->join('procesos', 'proceso_id', '=', 'procesos.id')
                            ->paginate(10);

        return view('rh.uploads', [
            'uploads' => $uploads
        ]);
    }

    public function importa_asignados(Request $request){
        try{
            $upload = new Upload();
            $upload->proceso_id = $request->input('proceso');
            $upload->descripcion = $request->input('descripcion');
            $upload->folio_oficialia_mayor = $request->input('folio_oficialia_mayor');
            $upload->tipo_contratacion = $request->input('tipo_contratacion');
            $upload->created_at = date('Y-m-d');
            $upload->save();
    
            $file = $request->file('file_input');
            Excel::import(new AsignadoImport, $file);
    
            return redirect()->route('upload')->with('success', 'El archivo se ha cargado correctamente.');
        } catch (Exception $ex){
            return redirect()->route('upload')->with('error', 'Hubo un error al intentar cargar el listado: '.$ex);
        }
    }    
}
