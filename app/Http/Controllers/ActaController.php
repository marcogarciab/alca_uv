<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Orden;
use Illuminate\Http\Request;

class ActaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('acta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orden_servicios = Orden::all()->pluck('codigo_servicio','id');
        return view('acta.create', compact('orden_servicios'));
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
            'numero' => 'required',
            'alcance_verificacion' => 'required',
            'hechos_verificacion' => 'required',
            'es_modifica_alcance' => 'required',
            'es_no_conformidad' => 'required',
            'fecha_fin' => 'required',
            'path' => 'required',
            'ordene_id ' => 'required',
        ]);

        $url = null;

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

            $acta = Acta::create([ 
                'numero' => request('numero'),
                'alcance_verificacion' => request('alcance_verificacion'),
                'hechos_verificacion' => request('hechos_verificacion'),
                'es_modifica_alcance' => request('es_modifica_alcance'),
                'es_no_conformidad' => request('es_no_conformidad'),
                'fecha_fin' => request('fecha_fin'),
                'ordene_id' => request('ordene_id'),
                'descripcion_no_conformidad' => request('descripcion_no_conformidad'),
                'descripcion_accion_correctiva' => request('descripcion_accion_correctiva'),
                'observaciones_protesta' => request('observaciones_protesta'),
                'observaciones_representante' => request('observaciones_representante'),
                'path' => $url,
            ]);
            
            return redirect()->route('actas.index')->with('info','Acta Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Acta $acta)
    {
        $ordenes = Orden::all()->pluck('codigo_servicio','id');
        return view('acta.show',compact('acta','ordenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Acta $acta)
    {
        $ordenes = Orden::all()->pluck('codigo_servicio','id');
        return view('acta.create', compact('acta','ordenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acta $acta)
    {
        $validated = $request->validate([
            'numero' => 'required',
            'alcance_verificacion' => 'required',
            'hechos_verificacion' => 'required',
            'es_modifica_alcance' => 'required',
            'es_no_conformidad' => 'required',
            'fecha_fin' => 'required',
            'path' => 'required',
            'ordene_id ' => 'required',
        ]);

        $acta = Acta::find($acta->id);

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $acta->path = $url;
        }

        $acta->numero = $request->numero;
        $acta->alcance_verificacion = $request->alcance_verificacion;
        $acta->hechos_verificacion = $request->hechos_verificacion;
        $acta->es_modifica_alcance = $request->es_modifica_alcance;
        $acta->es_no_conformidad = $request->es_no_conformidad;
        $acta->fecha_fin = $request->fecha_fin;
        $acta->ordene_id = $request->ordene_id;
        $acta->save();

        return redirect()->route('actas.edit', compact('acta'))->with('info','Se actualizaron los datos del Acta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acta $acta)
    {
        $acta->delete();
        return redirect()->route('ordenes.index')->with('info','Acta eliminada');
    }
}
