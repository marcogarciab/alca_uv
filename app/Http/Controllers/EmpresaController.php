<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\User;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresa.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = Auth::id();
        $user = new User();
        $user->id = $user_id;
        $cliente = Cliente::where('user_id', $user_id)->first();
        $clientes = null;
        if ($user->hasRole('Administrador')) {

            $clientes = Cliente::all()->pluck('full_name','id');
            return view('empresa.create',compact('cliente', 'clientes'));
        }
        else {

            return view('empresa.create',compact('cliente', 'clientes'));
        }
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
            
            'cliente_id' => 'required',
            'razon_social' => 'required|max:100',
            'nombre_comercial' => 'required|max:50',
            'rfc' => 'required|max:13',
            'curp' => 'required|max:18',
            'calle' => 'required|max:150',
            'num_int' => 'required',
            'num_ext' => 'required',
            'codigo_postal' => 'required',
            'colonia' => 'required|max:100',
            'estado' => 'required|max:100',
            'ciudad_municipio' => 'required|max:100',
            'entre_calles' => 'required|max:150',
            'referencias' => 'required|max:150',
        ]);

        $empresa = Empresa::create([ 
            'razon_social' => request('razon_social'),
            'nombre_comercial' => request('nombre_comercial'),
            'rfc' => request('rfc'),
            'curp' => request('curp'),
            'calle' => request('calle'),
            'num_int' => request('num_int'),
            'num_ext' => request('num_ext'),
            'codigo_postal' => request('codigo_postal'),
            'colonia' => request('colonia'),
            'estado' => request('estado'),
            'ciudad_municipio' => request('ciudad_municipio'),
            'entre_calles' => request('entre_calles'),
            'referencias' => request('referencias'),
            'cliente_id' => request('cliente_id'),
            'observaciones' => request('observaciones'),
            'nombre_representante' => request('nombre_representante'),
            'apellidos_representante' => request('apellidos_representante'),
            'telefono' => request('telefono'),
            'email' => request('email'),
            'created_at ' => now(),    
                   
        ]);

        return redirect()->route('empresas.edit',compact('empresa'))->with('info','Empresa guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresa.show',compact('empresa')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $validated = $request->validate([
            'razon_social' => 'required|max:100',
            'nombre_comercial' => 'required|max:50',
            'rfc' => 'required|max:13',
            'curp' => 'required|max:18',
            'calle' => 'required|max:150',
            'num_int' => 'required',
            'num_ext' => 'required',
            'codigo_postal' => 'required',
            'colonia' => 'required|max:100',
            'estado' => 'required|max:100',
            'ciudad_municipio' => 'required|max:100',
            'entre_calles' => 'required|max:150',
            'referencias' => 'required|max:150',
        ]);

        $empresa->update([ 
            'razon_social' => request('razon_social'),
            'nombre_comercial' => request('nombre_comercial'),
            'rfc' => request('rfc'),
            'curp' => request('curp'),
            'calle' => request('calle'),
            'num_int' => request('num_int'),
            'num_ext' => request('num_ext'),
            'codigo_postal' => request('codigo_postal'),
            'colonia' => request('colonia'),
            'estado' => request('estado'),
            'ciudad_municipio' => request('ciudad_municipio'),
            'entre_calles' => request('entre_calles'),
            'referencias' => request('referencias'),
            'observaciones' => request('observaciones'),
            'nombre_representante' => request('nombre_representante'),
            'apellidos_representante' => request('apellidos_representante'),
            'telefono' => request('telefono'),
            'email' => request('email'),
            'updated_at ' => date('Y-m-d G:i:s'),    
                   
        ]);

        $empresa->touch();
        return redirect()->route('empresas.edit',compact('empresa'))->with('info','Empresa Actualizada');
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
