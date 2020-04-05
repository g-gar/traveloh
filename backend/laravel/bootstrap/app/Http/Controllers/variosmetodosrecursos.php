<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//referenciando el modelo
use App\info;

class variosmetodosrecursos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Tambien se puede redireccionar rutas, en este caso a UsuarioController y a la funcion usuariounparametro y le dices lo que tiene que recojer(nombre)
        //return redirect()->action('UsuarioController@usuariounparametro', ['nombre'=>'Manucho']);
        
        //muestra todos los registros del modelo info
        $info = info::all();
        //dd($info);
        return view('varios')->with('info', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = new info;
        $info->nombre='Pedro';
        $info->descripcion='Asistente';
        $info->save();
        return 'Datos guardados correctamente';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = info::find($id);
        $info->delete();
        return 'El registro '.$id.' ha sido eliminado';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //acceder a un id, FindOrFail() para mostrar error en caso de no encontrar
        $info = info::find($id);
        //para actualizar info
        $info->nombre = 'Paco';
        $info->save();
        return 'Datos actualizados';
        //Para buscar solo un campo en especifico
        //$info = info::where('id', $id)->firstOrFail();
        //dd($info); 
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
