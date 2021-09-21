<?php

namespace App\Http\Controllers;

use App\Models\Propuesta;
use App\Models\SolicitudPropuesta;
use App\Models\Verificador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('propuesta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $verificadores = Verificador::all()->pluck('nombre','id');
        $solicitud_propuestas = SolicitudPropuesta::all()->pluck('numero','id');
        
        return view('propuesta.create', compact('verificadores','solicitud_propuestas'));
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
            'numero_control' => 'required',
            'costo' => 'required',
            'solicitud_propuesta_id' => 'required',
            'verificadore_id' => 'required',
        ]);

        $url = null;

        if ($request->es_aceptada) {
            $request->es_aceptada = true;
        }
        else {
            $request->es_aceptada = false;
        }

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

            $propuesta = Propuesta::create([ 
                'numero_control' => request('numero_control'),
                'costo' => request('costo'),
                'solicitud_propuesta_id' => request('solicitud_propuesta_id'),
                'verificadore_id' => request('verificadore_id'),
                'es_aceptada' => $request->es_aceptada,
                'path' => $url,
            ]);
            
            return redirect()->route('propuestas.index')->with('info','Propuesta Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Propuesta $propuesta)
    {
        $verificadores = Verificador::all()->pluck('nombre','id');
        $solicitud_propuestas = SolicitudPropuesta::all()->pluck('numero','id');
       
        $url = Storage::url($propuesta->path);

        $url =str_replace("/storage/", "/", $url);

        return view('propuesta.show',compact('propuesta','verificadores', 'solicitud_propuestas', 'url' ));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Propuesta $propuesta)
    {
        $verificadores = Verificador::all()->pluck('nombre','id');
        $solicitud_propuestas = SolicitudPropuesta::all()->pluck('numero','id');

        $url = Storage::url($propuesta->path);

        $url =str_replace("/storage/", "/", $url); 

        return view('propuesta.edit',compact('propuesta','verificadores', 'solicitud_propuestas', 'url' ));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuesta $propuesta)
    {

        $validated = $request->validate([
            'numero_control' => 'required',
            'costo' => 'required',
            'solicitud_propuesta_id' => 'required',
            'verificadore_id' => 'required',
        ]);

        $propuesta = Propuesta::find($propuesta->id);

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $propuesta->path = $url;
        }

        if ($request->has('es_aceptada') == 1) {
            $request->es_aceptada = true;
        }
        else {
            $request->es_aceptada = false;
        }

        $propuesta->numero_control = $request->numero_control;
        $propuesta->costo = $request->costo;
        $propuesta->solicitud_propuesta_id = $request->solicitud_propuesta_id;
        $propuesta->verificadore_id = $request->verificadore_id;
        $propuesta->fecha_aceptacion = now();
        $propuesta->es_aceptada = $request->es_aceptada;
        $propuesta->save();

        $verificadores = Verificador::all()->pluck('nombre','id');
        $solicitud_propuestas = SolicitudPropuesta::all()->pluck('numero','id');
        
        return redirect()->route('propuestas.edit', compact('propuesta'))->with('info','Se actualizaron los datos de la Propuesta');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propuesta $propuesta)
    {
        $propuesta->delete();
        return redirect()->route('propuestas.index')->with('info','Propuesta eliminada');
    }
}
