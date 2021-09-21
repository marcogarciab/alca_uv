<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Propuesta;
use App\Models\Verificador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orden.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $verificadores = Verificador::all()->pluck('nombre','id');
        $propuestas = Propuesta::all()->pluck('numero_control','id');
        
        return view('orden.create', compact('verificadores','propuestas'));
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
            'codigo_servicio' => 'required',
            'fecha_verificacion' => 'required',
            'propuesta_id' => 'required',
            'verificadore_id' => 'required',
        ]);

        $url = null;

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

            $orden = Orden::create([ 
                'codigo_servicio' => request('codigo_servicio'),
                'fecha_verificacion' => request('fecha_verificacion'),
                'propuesta_id' => request('propuesta_id'),
                'verificadore_id' => request('verificadore_id'),
                'path' => $url,
            ]);
            
            return redirect()->route('ordenes.index')->with('info','Órden Servicio Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $ordene)
    {
        $propuestas = Propuesta::all()->pluck('numero_control','id');
        $verificadores = Verificador::all()->pluck('nombre','id');
       
        $url = Storage::url($ordene->path);

        $url =str_replace("/storage/", "/", $url);

        return view('orden.show',compact('ordene','propuestas', 'verificadores','url' ));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $ordene)
    {
        $propuestas = Propuesta::all()->pluck('numero_control','id');
        $verificadores = Verificador::all()->pluck('nombre','id');
        
        $url = Storage::url($ordene->path);

        $url =str_replace("/storage/", "/", $url); 

        return view('orden.edit',compact('ordene','propuestas','verificadores', 'url' ));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $ordene)
    {
        $validated = $request->validate([
            'codigo_servicio' => 'required',
            'fecha_verificacion' => 'required',
            'propuesta_id' => 'required',
            'verificadore_id' => 'required',
        ]);

        $orden = Orden::find($ordene->id);

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $orden->path = $url;
        }

        $orden->codigo_servicio = $request->codigo_servicio;
        $orden->fecha_verificacion = $request->fecha_verificacion;
        $orden->propuesta_id = $request->propuesta_id;
        $orden->verificadore_id = $request->verificadore_id;
        $orden->save();

        return redirect()->route('ordenes.edit', compact('ordene'))->with('info','Se actualizaron los datos de la Orden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        $orden->delete();
        return redirect()->route('ordenes.index')->with('info','Orden Servicio eliminada');
    }
}
