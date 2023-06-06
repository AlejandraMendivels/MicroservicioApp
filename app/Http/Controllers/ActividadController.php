<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::all();//Select
        $data = json_encode([
            "data"=> $actividades 
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
        $actividades = new Actividad();
        $actividades->descripcion = $request->input('descripcion');
        $actividades->nota = $request->input('nota');
        $actividades->codigoEstudiante = $request->input('codigoEstudiante');
        $actividades->save();
        return response(json_encode([
            "data" => "Actividad registrado"
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $actividades = Actividad::find($codigo);
       return response (json_encode([
        "data" => $actividades
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
        $actividades = Actividad::find($id);
        $actividades->descripcion = $request->input('descripcion');
        $actividades->nota = $request->input('nota');
        $actividades->codigoEstudiante = $request->input('codigoEstudiante');
        $actividades->save();
        return response (json_encode([
            "data" => "Actividad actualizado"
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
        $actividades = Actividad::find($id);
        if(empty($actividades)){
            return response (json_encode([
                "data" => "La Actividad no existe"
            ]),404);  //Registro No existe
        }
        $actividades->delete();
        return response(json_encode([
            "data" => "Actividad eliminado"
        ]));
    }

}



