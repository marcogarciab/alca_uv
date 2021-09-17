<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificacionTipo;

class VerificacionTipoController extends Controller
{


      // public function __construct()
    // {
    //     $this->middleware(['role:Admin', 'permission:Eliminar']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verificacion_tipo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verificacion_tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $verificacion_tipo = VerificacionTipo::create($request->all());
        return redirect()->route('verificacion_tipos.index')->with('info','Verificacion Tipo guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VerificacionTipo $verificacion_tipo)
    {
        return view('verificacion_tipo.show',compact('verificacion_tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VerificacionTipo $verificacion_tipo)
    {
        return view('verificacion_tipo.edit', compact('verificacion_tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VerificacionTipo $verificacion_tipo,Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $verificacion_tipo->update($request->all());
        $verificacion_tipo->touch();
        return redirect()->route('verificacion_tipos.index')->with('info','Verificacion Tipo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerificacionTipo $verificacion_tipo)
    {
       $verificacion_tipo->delete();
       return redirect()->route('verificacion_tipos.index')->with('info','Verificacion Tipo eliminado');
    }
}
