<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Dictamen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DictamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dictamen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actas = Acta::all()->pluck('numero','id');
        return view('dictamen.create', compact('actas'));
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
            'acta_id' => 'required',
            'path' => 'required',
        ]);

        $url = null;

        if ($request->hasFile('path')) {
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
        }

        if ($request->has('es_aprobado') == 1) {
            $request->es_aprobado = true;
        }
        else {
            $request->es_aprobado = false;
        }

            $dictamen = Dictamen::create([ 
                'numero' => request('numero'),
                'acta_id' => request('acta_id'),
                'path' => $url,
                'es_aprobado' => $request->es_aprobado,
            ]);
            
            return redirect()->route('dictamenes.index')->with('info','Dictamen Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dictamen $dictamene)
    {
        $actas = Acta::all()->pluck('numero','id');

        $url = Storage::url($dictamene->path);

        $url =str_replace("/storage/", "/", $url); 

        return view('dictamen.show',compact('dictamene','actas','url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictamen $dictamene)
    {
        $actas = Acta::all()->pluck('numero','id');

        $url = Storage::url($dictamene->path);

        $url =str_replace("/storage/", "/", $url); 

        return view('dictamen.edit', compact('dictamene','actas','url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dictamen $dictamene)
    {
        //return $request;
        $validated = $request->validate([
            'numero' => 'required',
            'acta_id' => 'required',
            'path' => 'required',
        ]);
        
        $dictamen = Dictamen::find($dictamene->id);


        if ($request->has('es_aprobado') == 1) {
            $request->es_aprobado = true;
        }
        else {
            $request->es_aprobado = false;
        }

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $dictamen->path = $url;
        }

        $dictamen->numero = $request->numero;
        $dictamen->es_aprobado = $request->es_aprobado;
        $dictamen->acta_id = $request->acta_id;
        $dictamen->save();

    

        return redirect()->route('dictamenes.edit', compact('dictamene'))->with('info','Se actualizaron los datos del Dictamen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dictamen $dictamen)
    {
        $dictamen->delete();
        return redirect()->route('ordenes.index')->with('info','Dictamen eliminado');
    }
}
