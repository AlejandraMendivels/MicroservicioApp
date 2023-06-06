<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();//Select
        $data = json_encode([
            "data"=> $estudiantes 
        ]);
        return response ($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $estudiantes = new Estudiante();
        $estudiantes->codigo = $request->input('codigo');
        $estudiantes->nombres = $request->input('nombres');
        $estudiantes->apellidos = $request->input('apellidos');
        $estudiantes->save();
        return response(json_encode([
            "data" => "Estudiante registrado"
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $estudiantes = Estudiante::find($id);
       return response (json_encode([
        "data" => $estudiantes
       ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $estudiantes = Estudiante::find($id);
        // $estudiantes->codigo = $request->input('codigo');
        $estudiantes->nombres = $request->input('nombres');
        $estudiantes->apellidos = $request->input('apellidos');
        $estudiantes->save();
        return response (json_encode([
            "data" => "Estudiate actualizado"
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiantes = Estudiante::find($id);
        if(empty($estudiantes)){
            return response (json_encode([
                "data" => "El estudiante no existe"
            ]),404);  //Registro No existe
        }
        $estudiantes->delete();
        return response(json_encode([
            "data" => "Estudiante eliminado"
        ]));
    }

}
