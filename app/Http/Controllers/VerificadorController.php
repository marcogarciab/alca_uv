<?php

namespace App\Http\Controllers;

use App\Models\Verificador;
use Illuminate\Http\Request;

class VerificadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verificador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('verificador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//return $request->all();

        $validated = $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'serial_certificacion' => 'required',
        ]);
           
        $solicitud_propuesta = Verificador::create([ 
                'nombre' => request('nombre'),
                'apellido_paterno' => request('apellido_paterno'),
                'apellido_materno' => request('apellido_materno'),
                'serial_certificacion' => request('serial_certificacion'),
        
        ]);

        return redirect()->route('verificadores.index')->with('info','Verificador guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Verificador $verificadore)
    {
        return view('verificador.show',compact('verificadore'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Verificador $verificadore)
    {
        return view('verificador.edit',compact('verificadore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verificador $verificadore)
    {

//return $request->all();

        $validated = $request->validate([
            'nombre' => 'required|max:191',
            'apellido_paterno' => 'required|max:191',
            'apellido_materno' => 'required|max:191',
            'serial_certificacion' => 'required|max:191',

        ]);

        $verificadore->update([ 
            'nombre' => request('nombre'),
            'apellido_paterno' => request('apellido_paterno'),
            'apellido_materno' => request('apellido_materno'),
            'serial_certificacion' => request('serial_certificacion'),
        ]);


        $verificadore->update($request->all());
        $verificadore->touch();
        return redirect()->route('verificadores.index')->with('info','Verificador actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verificador $verificadore)
    {
        $verificadore->delete();
        return redirect()->route('verificadores.index')->with('info','Verificador eliminado');
    }
}
