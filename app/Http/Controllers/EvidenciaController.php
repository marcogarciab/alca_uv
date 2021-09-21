<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Evidencia;
use App\Models\EvidenciaTipo;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('evidencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evidencia_tipos = EvidenciaTipo::all()->pluck('nombre','id');
        $actas = Acta::all()->pluck('numero','id');
        
        return view('evidencia.create', compact('evidencia_tipos','actas'));
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
            'path' => 'required',
            'evidencia_tipo_id' => 'required',
            'acta_id' => 'required',
        ]);

        $url = null;

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

            $evidencia = Evidencia::create([ 
                'evidencia_tipo_id' => request('evidencia_tipo_id'),
                'acta_id' => request('acta_id'),
                'path' => $url,
            ]);
            
            return redirect()->route('evidencias.index')->with('info','Evidencia Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evidencia $evidencia)
    {
        $evidencia_tipos = EvidenciaTipo::all()->pluck('nombre','id');
        $actas = Acta::all()->pluck('numero','id');
        return view('evidencia.show',compact('evidencia','evidencia_tipos','actas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evidencia $evidencia)
    {
        $evidencia_tipos = EvidenciaTipo::all()->pluck('nombre','id');
        $actas = Acta::all()->pluck('numero','id');
        
        return view('evidencia_tipo.create', compact('evidencia','normas','evidencia_tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evidencia $evidencia)
    {
        $validated = $request->validate([
            'path' => 'required',
            'evidencia_tipo_id' => 'required',
            'acta_id' => 'required',
        ]);

        $evidencia = Evidencia::find($evidencia->id);

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $evidencia->path = $url;
        }

        $evidencia->evidencia_tipo_id = $request->evidencia_tipo_id;
        $evidencia->acta_id = $request->acta_id;
        $evidencia->save();

        return redirect()->route('evidencias.edit', compact('evidencia'))->with('info','Se actualizaron los datos de la Evidencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evidencia $Evidencia)
    {
        $Evidencia->delete();
        return redirect()->route('ordenes.index')->with('info','Evidencia eliminada');
    }
}
