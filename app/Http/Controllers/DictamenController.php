<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Dictamen;
use Illuminate\Http\Request;

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

            $dictamen = Dictamen::create([ 
                'numero' => request('numero'),
                'acta_id' => request('acta_id'),
                'path' => $url,
            ]);
            
            return redirect()->route('dictamenes.index')->with('info','Dictamen Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dictamen $dictamen)
    {
        $actas = Acta::all()->pluck('numero','id');
        return view('dictamen.show',compact('dictamen','actas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictamen $dictamen)
    {
        $actas = Acta::all()->pluck('numero','id');
        return view('dictamen.create', compact('dictamen','actas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dictamen $dictamen)
    {
        $validated = $request->validate([
            'numero' => 'required',
            'es_aprobado' => 'required',
            'acta_id' => 'required',
            'path' => 'path',
        ]);

        $dictamen = Dictamen::find($dictamen->id);

        if($request->hasFile('path')){
            $archivo =  $request->file('path')->store('/public');
            $url = str_replace("public", "storage", $archivo);
            $dictamen->path = $url;
        }

        $dictamen->numero = $request->numero;
        $dictamen->es_aprobado = $request->es_aprobado;
        $dictamen->acta_id = $request->acta_id;
        $dictamen->save();

        return redirect()->route('dictamenes.edit', compact('dictamen'))->with('info','Se actualizaron los datos del Dictamen');
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
