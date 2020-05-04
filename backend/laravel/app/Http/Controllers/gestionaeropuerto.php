<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\aeropuerto;

class gestionaeropuerto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeropuerto = aeropuerto::all();
        return view('aeropuerto')->with('aeropuerto', $aeropuerto);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aeropuerto = new aeropuerto;
        $aeropuerto->nombre='Aeropuerto de Paris';
        $aeropuerto->descripcion='Aeropuerto frances de Paris';
        $aeropuerto->latitud='-4.3267726';
        $aeropuerto->longitud='15.3280693';
        $aeropuerto->save();
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
        $aeropuerto = aeropuerto::find($id);
        $aeropuerto->delete();
        return 'El aeropuerto '.$id.' ha sido eliminado';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aeropuerto = aeropuerto::find($id);
        //para actualizar info
        $aeropuerto->nombre = 'Paco';
        $aeropuerto->save();
        return 'Datos actualizados';
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
        //
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
