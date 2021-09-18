<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudPropuesta;
use App\Models\Norma;
use App\Models\VerificacionTipo;
use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;

class SolicitudPropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solicitud_propuesta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all()->pluck('razon_social','id');
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');
        
        return view('solicitud_propuesta.create', compact('empresas','normas','verificacion_tipos'));
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
            'empresa_id' => 'required',
            'norma_id' => 'required',
            'verificacion_tipo_id' => 'required',
            'path' => 'required',
            // 'path.*' => 'required',
        ]);

            $imagen =  $request->file('path')->store('/public');

            $nombre_original = $request->file('path')->getClientOriginalName();
           
            $url = str_replace("public", "storage", $imagen);
            $solicitud_propuesta = SolicitudPropuesta::create([ 
            
                'numero' => SolicitudPropuesta::max('numero') +1,
                'empresa_id' => request('empresa_id'),
                'norma_id' => request('norma_id'),
                'verificacion_tipo_id' => request('verificacion_tipo_id'),
                'path' => $url,
        
            ]);
    
            $empresas = Empresa::all()->pluck('razon_social','id');
            $normas = Norma::all()->pluck('nombre','id');
            $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');

            return view('solicitud_propuesta.show',compact('solicitud_propuesta','empresas', 'normas', 'verificacion_tipos','url'));     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudPropuesta $solicitud_propuesta)
    {

        $empresas = Empresa::all()->pluck('razon_social','id');
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');

        //$imagen =  $solicitud_propuesta->file('path')->store('public/solicitud_propuestas/');
        $url = Storage::url($solicitud_propuesta->path);

        $url =str_replace("/storage/", "/", $url);

        return view('solicitud_propuesta.show',compact('solicitud_propuesta','empresas', 'normas', 'verificacion_tipos', 'url' ));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SolicitudPropuesta $solicitud_propuesta)
    {
        $empresas = Empresa::all()->pluck('razon_social','id');
        $normas = Norma::all()->pluck('nombre','id');
        $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');

        //$imagen =  $solicitud_propuesta->file('path')->store('public/solicitud_propuestas/');
        $url = Storage::url($solicitud_propuesta->path);

        $url =str_replace("/storage/", "/", $url); 
        return view('solicitud_propuesta.edit',compact('solicitud_propuesta','empresas', 'normas', 'verificacion_tipos', 'url' ));  
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudPropuesta $solicitud_propuesta)
    {
        $validated = $request->validate([
            'empresa_id' => 'required',
            'norma_id' => 'required',
            'verificacion_tipo_id' => 'required',
            'path' => 'required',
            // 'path.*' => 'required',
        ]);

        $solicitud_propuesta = SolicitudPropuesta::find($solicitud_propuesta->id);
        if($request->hasFile('path')){
       
            $imagen =  $request->file('path')->store('/public');

            $nombre_original = $request->file('path')->getClientOriginalName();
           
            $url = str_replace("public", "storage", $imagen);
           
            $solicitud_propuesta->path = $url;
        }
        $solicitud_propuesta->empresa_id = $request->empresa_id;
        $solicitud_propuesta->norma_id = $request->norma_id;
        $solicitud_propuesta->verificacion_tipo_id = $request->verificacion_tipo_id;
        $solicitud_propuesta->save();

            $empresas = Empresa::all()->pluck('razon_social','id');
            $normas = Norma::all()->pluck('nombre','id');
            $verificacion_tipos = VerificacionTipo::all()->pluck('nombre','id');
        
        return redirect()->route('solicitud_propuestas.edit',compact('solicitud_propuesta'))->with('info','Se actualizaron los datos de la Solicitud');
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
