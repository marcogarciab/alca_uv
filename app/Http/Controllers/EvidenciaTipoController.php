<?php

namespace App\Http\Controllers;

use App\Models\EvidenciaTipo;
use App\Models\Norma;
use App\Models\VerificacionTipo;
use Illuminate\Http\Request;

class EvidenciaTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evidencia_tipo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');
        
        return view('evidencia_tipo.create', compact('normas','verificacion_tipos'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'norma_id' => 'required',
            'verificacion_tipo_id ' => 'required',
        ]);

        $url = null;

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

            $orden = EvidenciaTipo::create([ 
                'nombre' => request('nombre'),
                'descripcion' => request('descripcion'),
                'norma_id' => request('norma_id'),
                'verificacion_tipo_id' => request('verificacion_tipo_id'),
                'path' => $url,
            ]);
            
            return redirect()->route('evidencia_tipos.index')->with('info','Tipo Evidencia Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EvidenciaTipo $evidencia_tipo)
    {
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');
        return view('evidencia_tipo.show',compact('evidencia_tipo','normas','verificacion_tipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EvidenciaTipo $evidencia_tipo)
    {
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');
        
        return view('evidencia_tipo.edit', compact('evidencia_tipo'.'normas','verificacion_tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvidenciaTipo $evidencia_tipo)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'norma_id' => 'required',
            'verificacion_tipo_id ' => 'required',
        ]);

        $orden = EvidenciaTipo::find($evidencia_tipo->id);

        $orden->nombre = $request->nombre;
        $orden->descripcion = $request->descripcion;
        $orden->norma_id = $request->norma_id;
        $orden->verificacion_tipo_id = $request->verificacion_tipo_id;
        $orden->save();

        return redirect()->route('evidencia_tipos.edit', compact('orden'))->with('info','Se actualizaron los datos del tipo de evidencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvidenciaTipo $evidencia_tipo)
    {
        $evidencia_tipo->delete();
        return redirect()->route('ordenes.index')->with('info','Evidencia Tipo eliminada');
    }
}
