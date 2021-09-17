<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index');    }

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
        $users = null;
        
        if ($user->hasRole('Administrador')) {
            $users = User::all()->pluck('name','id');
   
            return view('cliente.create',compact('user', 'users'));
        }
        else {
            return view('cliente.create',compact('user', 'users'));
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
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:15',
            'fecha_nacimiento' => 'required',
            'observaciones' => 'required|max:300',
            'user_id' => 'required|unique:clientes',
        ]);

        $ultimo_cliente = Cliente::max('numero');

        $cliente = Cliente::create([ 
            
            'numero' => $ultimo_cliente + 1,
            'nombre' => request('nombre'),
            'apellido_paterno' => request('apellido_paterno'),
            'apellido_materno' => request('apellido_materno'),
            'telefono' => request('telefono'),
            'fecha_nacimiento' => request('fecha_nacimiento'),
            'observaciones' => request('observaciones'),
            'created_at' => now(),
            'updated_at' => request('updated_at'),
            'user_id' => request('user_id'),
        ]);

        return redirect()->route('clientes.edit',compact('cliente'))->with('info','Cliente guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show',compact('cliente'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:15',
            'fecha_nacimiento' => 'required',
            'observaciones' => 'required|max:300',
        ]);
    
        $cliente->update([ 
            'nombre' => request('nombre'),
            'apellido_paterno' => request('apellido_paterno'),
            'apellido_materno' => request('apellido_materno'),
            'telefono' => request('telefono'),
            'fecha_nacimiento' => request('fecha_nacimiento'),
            'observaciones' => request('observaciones'),
            'updated_at' => now(),
        ]);

        $cliente->touch();
        //$cliente->permissions()->sync($request->permissions);
        return redirect()->route('clientes.edit',compact('cliente'))->with('info','Se actualizaron los datos del Cliente');
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
